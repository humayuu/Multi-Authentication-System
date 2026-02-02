<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">

            @php
                $auth = Auth::guard('admin')->user();
            @endphp
            <div class="col-12 m-5">
                @if (session('success'))
                    <div class="alert mt-5 alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert mt-5 alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h1>Admin Profile</h1>
                <div class="card">

                    <div class="card-body">
                        <h2>Profile Information</h2>
                        <h6>Update your account's profile information and email address.</h6>
                        <form method="POST" action="{{ route('admin.profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $auth->name }}"
                                    autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{ $auth->email }}">
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
                        <form method="POST" action="{{ route('admin.password.update') }}">
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
                        <a class="btn btn-dark mt-2" href="{{ route('admin.dashboard') }}">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
