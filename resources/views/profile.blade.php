@extends('layout')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12 m-5">
                <h1>Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <h2>Profile Information</h2>
                        <h6>Update your account's profile information and email address.</h6>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Update Password</h2>
                        <h6>Ensure your account is using a long, random password to stay secure.</h6>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Delete Account</h2>
                        <h6>Once your account is deleted, all of its resources and data will be permanently deleted. Before
                            deleting your account, please download any data or information that you wish to retain.</h6>

                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <div class="alert alert-warning mt-3" role="alert">
                                <h5 class="alert-heading">Are you sure you want to delete your account?</h5>
                                <p class="mb-0">Once your account is deleted, all of its resources and data will be
                                    permanently deleted. Please enter your password to confirm you would like to permanently
                                    delete your account.</p>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control"
                                    placeholder="Password" required />
                                @error('password', 'userDeletion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-danger">
                                    Delete Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
