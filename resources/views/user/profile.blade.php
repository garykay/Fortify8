@extends('templates.main')

@section('content')

    <h1>Update Profile</h1>
    <form method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ auth()->user()->name }}" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ auth()->user()->email }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button class="btn btn-primary" type="submit">Update Profile</button>
    </form>


@endsection
