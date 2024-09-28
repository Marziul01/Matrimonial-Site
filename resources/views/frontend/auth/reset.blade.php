@extends('frontend.master')

@section('content')
<div class="section homebg">
    <div class="d-flex justify-content-center align-items-center flex-column">
        <h2 class="text-white p-3">Reset Password</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="pasasRecevory">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary submiti">Reset Password</button>
        </form>
    </div>

</div>
@endsection
