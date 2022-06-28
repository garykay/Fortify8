@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="float-start">Posts</h1>
            <a class="btn btn-success float-end" role="button" href="{{route('admin.posts.create')}}">Create</a>
        </div>
    </div>

@endsection
