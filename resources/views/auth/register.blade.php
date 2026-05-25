@extends('layout.app')

@section('title', 'Sign Up')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-3">
            <div class="card-body p-5">
                <h3 class="text-center fw-bold mb-4">Sign Up</h3>
                <p class="text-muted text-center small mb-4">Sign up for a new account to start using the system.</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name" required>
                        @error('name')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@email.com" required>
                        @error('email')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimum 8 characters" required>
                        @error('password')
                            <div class="invalid-feedback small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label small fw-bold">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repeat your password" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 rounded-2 fw-bold mb-3">Daftar Akun</button>
                    <p class="text-center small text-muted mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection