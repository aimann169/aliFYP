@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manage ActivityResult'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                @if (session()->has('success'))
                    <div id="alert">
                        @include('components.alert')
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between mb-3">
                        <h6>Manage Activity Result</h6>
                        {{-- <a href="{{ route('activity_result.create') }}" class="btn btn-primary btn-sm float-end mb-0">Add Activity Result</a> --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="activity_result-datatable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">student</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">matric id</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">marks</th>
                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">activity type</th>
                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration + ($datas->currentPage() - 1) * $datas->perPage() }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0">{{ $data->user->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0">{{ $data->user->matric_id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0">{{ $data->marks }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0">{{ $data->activity_type }}</p>
                                            </td>
                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a class="text-primary me-3" href="{{ route('activity_result.show', ['activity_result' => $data->id]) }}"><i class="fa fa-eye fa-lg" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"></i></a>
                                                    <a class="text-secondary me-3" href="{{ route('activity_result.edit', ['activity_result' => $data->id]) }}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i></a>
                                                    <a class="text-danger" href="#" onclick="deleteRecord('{{ route('activity_result.destroy', ['activity_result' => $data->id]) }}')"><i class="fa fa-trash-o fa-lg" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script>
        const activityResultDatatable = new simpleDatatables.DataTable("#activity_result-datatable", {
            paging: true,
            perPage: 10,
            searchable: true,
            fixedHeight: true,
            columns: [{
                select: 5, // Action column index
                sortable: false
            }],
            labels: {
                placeholder: "Type to search...",
                noRows: "There is no activity_result available."
            }
        });
        function deleteRecord(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2A2A2A',
                cancelButtonColor: '#008080',
                confirmButtonText: 'Yes, delete it!',
                preConfirm: (input) => {
                    return fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                _token: "{{ csrf_token() }}"
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error}`)
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'The activity_result has been deleted.',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            })
        }
    </script>
@endpush
