@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create ActivityResult'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create ActivityResult</h6>
                    </div>
                    <div class="card-body p-3">
                        <form role="form" method="POST" action="{{ route('activity_result.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">user_id <span class="text-danger">*</span></label>
                                        <select class="form-select" name="user_id">
                                            <option selected>Open this select menu</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">marks <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="marks" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">activity_type <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="activity_type" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-2">
                                <button type="button" onclick="history.back()" class="btn btn-secondary btn-md ms-auto">Back</button>
                                <button type="submit" class="btn btn-primary btn-md ms-auto">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
@push('js')
    <script></script>
@endpush
