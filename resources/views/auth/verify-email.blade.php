@extends('templates.main')

@section('content')

    <h1>Verify e-mail address</h1>

    <p>You must varify your email to access this page!</p>

    <form method="post" action="{{route('verification.send')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Resend verification email</button>

    </form>

@endsection
