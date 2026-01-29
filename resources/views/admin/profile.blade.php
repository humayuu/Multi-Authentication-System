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
            <div class="col-6 mx-auto m-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center fw-bold">Admin Profile</h1>
                        <hr class="border-5">
                        <form method="POST" action="{{ route('admin.profile.update', $admin->id) }}">
                            @csrf
                            @method('PATCH')

                            <h4>Profile Information</h4>
                            <div class="mb-3">
                                <label class="form-label">Fullname</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    name="fullname" value="{{ $admin->fullname }}" autofocus>
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $admin->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <h4>Update Password</h4>
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    name="confirm_password">
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Back</a>
                            <button type="submit" class="btn  btn-dark">Save Changes</button>

                        </form>
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
