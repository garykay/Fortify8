@extends('templates.main')

@section('content')
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Reset Password</button>
    </form>
@endsection

