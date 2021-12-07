@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="float-start">Users</h1>
            <a class="btn btn-success float-end" role="button" href="{{route('admin.users.create')}}">Create</a>
        </div>
    </div>



    <div class="card">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <!-- get user roles -->
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        <td>
                            <a class="btn btn-sm btn-warning" role="button"
                                href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                            <a class="btn btn-sm btn-danger" role="button"
                                href="{{ route('admin.users.destroy', $user->id) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">Delete</a>
                            <form id="delete-user-form-{{ $user->id }}"
                                action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{$users->links()}}

    </div>


@endsection
