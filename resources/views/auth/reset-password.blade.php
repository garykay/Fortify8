@extends('templates.main')

@section('content')

    <h1>Password Reset</h1>
    <form method="POST" action="{{ url('reset-password') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $request->email }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password_confirmation" class="col-sm-2 col-form-label">Password Repeat</label>
            <div class="col-sm-10">
                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Reset Password</button>
    </form>


@endsection
