@extends('layout')
@section('main')
    <div id="page">
        <main class="bg-light">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <div class="card shadow-sm">

                            <div class="card-body p-4">
                                <h3 class="card-title text-center mb-4">Create an Account</h3>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Fullname" value="{{ old('name') }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm Password">
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg">Sign Up</button>
                                    </div>
                                </form>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
