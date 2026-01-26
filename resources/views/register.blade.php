<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Authentication System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6 mx-auto">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h1 class="fw-bold text-primary">Multi Authentication System</h1>
                        </div>

                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">Fullname</label>
                                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="Enter your fullname">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-semibold">Email address</label>
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label fw-semibold">Confirm
                                    Password</label>
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Enter your confirm password">
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Create an Account</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="text-decoration-none">Already have an account</a>
                        </div>
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
