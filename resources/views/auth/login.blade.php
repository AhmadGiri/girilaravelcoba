@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-3">
            <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4">Welcome Back</h3>
                <p class="text-muted text-center small mb-4">Please Login to your account to manage product.</p>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 small" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@email.com" required>
                        @error('email')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 rounded-2 fw-bold mb-3">Login</button>
                    <p class="text-center small text-muted mb-0">Not have an account? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Sign Up here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection