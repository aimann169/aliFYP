@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name ?? '' }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('user.profile-update') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0">Edit Profile</p>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="showPasswordFields()">Change
                                        Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Matric Number
                                            (ID)</label>
                                        <input class="form-control" type="text" name="matric_id"
                                            value="{{ old('matric_id', auth()->user()->matric_id) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row" id="password-reset-fields" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new-password" class="form-control-label">New Password</label>
                                        <input id="new-password" class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="repeat-password" class="form-control-label">Repeat Password</label>
                                        <input id="repeat-password" class="form-control" type="password"
                                            name="confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>

    <script>
        function showPasswordFields() {
            document.getElementById('password-reset-fields').style.display = 'block';
        }
    </script>
@endsection
