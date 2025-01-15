@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manage Users'])
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
                        <h6>Manage Users</h6>
                        <div>
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm float-end mb-0">Add
                                User</a>
                            @if (auth()->user()->role == 'lecturer')
                                <button type="button" class="btn btn-secondary btn-sm float-end mb-0 me-2"
                                    data-bs-toggle="modal" data-bs-target="#modal-form">Bulk Upload</button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="user-datatable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        @if (auth()->user()->role == 'lecturer')
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Matric ID
                                            </th>
                                        @endif
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$datas->isEmpty())
                                        @php $counter = 0; @endphp
                                        @foreach ($datas as $data)
                                            @php $counter++; @endphp
                                            <tr>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $counter }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $data['name'] }}</p>
                                                </td>
                                                @if (auth()->user()->role == 'lecturer')
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0">
                                                            {{ $data['matric_id'] }}</p>
                                                    </td>
                                                @endif
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $data['email'] }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ ucfirst($data['role']) }}</p>
                                                </td>
                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                        <a class="text-primary me-3"
                                                            href="{{ route('user.show', ['user' => $data['id']]) }}"><i
                                                                class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                                                        <a class="text-secondary me-3"
                                                            href="{{ route('user.edit', ['user' => $data['id']]) }}"><i
                                                                class="fa fa-pencil-square-o fa-lg"
                                                                aria-hidden="true"></i></a>
                                                        <a class="text-danger" href="#"
                                                            onclick="deleteRecord('{{ route('user.destroy', ['user' => $data['id']]) }}')"><i
                                                                class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0">There is no user
                                                    available.
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info">Bulk Upload</h3>
                                <p class="mb-0">Upload a CSV file to add multiple students.</p>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" id="bulkUploadForm" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label>CSV File</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="file" class="form-control" placeholder="CSV File"
                                            aria-label="CSV File" aria-describedby="csv-file-addon">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Upload</button>
                                    </div>
                                </form>
                            </div>
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
        const userDatatable = new simpleDatatables.DataTable("#user-datatable", {
            paging: true,
            perPage: 10,
            searchable: true,
            fixedHeight: true,
            columns: [
                {
                    select: {{ auth()->user()->role == 'lecturer' ? 5 : 4 }}, //column-index
                    sortable: false
                }
            ],
            labels: {
                placeholder: "Type to search...",
                noRows: "There is no user available."
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
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'The user has been deleted.',
                        'success'
                    )
                    setTimeout(() => {
                        document.location.reload();
                    }, 2000);
                }
            })
        }

        $(document).ready(function() {
            $('#bulkUploadForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route('user.bulk-upload') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire(
                            'Success!',
                            'The student details have been bulk uploaded.',
                            'success'
                        )
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred during the upload.',
                            'error'
                        )
                    }
                });
            });
        });
    </script>
@endpush
