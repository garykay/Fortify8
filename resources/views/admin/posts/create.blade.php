@extends('templates.main')

@section('content')

    <form action="{{ route('admin.posts.store')}} " method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="featured_image">Featured Image</label>
            <input type="file" class="form-control" id="featured_image" name="featured_image" placeholder="Featured Image">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
