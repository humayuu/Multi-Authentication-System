<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User Manage</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar-brand img {
            max-height: 35px;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: none;
            z-index: 1000;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.svg" alt="Logo" width="100">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">

                        @if (Auth::check())
                            <li class="nav-item d-flex align-items-center me-2">
                                <a class="btn btn-outline-primary" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person-circle"></i> My Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-secondary" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus"></i> Register
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')




    <!-- Back to Top Button -->
    <button class="btn btn-primary back-to-top" id="backToTop" onclick="scrollToTop()">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Back to Top Script -->
    <script>
        // Show/hide back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        // Scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

</body>

</html>
