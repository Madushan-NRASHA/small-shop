@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.login') }}" method="POST">
                        @csrf <!-- CSRF token for Laravel security -->

                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>

                        <!-- Remember me checkbox -->
                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        <!-- Forgot password link -->
                        <div class="text-center mt-3">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
