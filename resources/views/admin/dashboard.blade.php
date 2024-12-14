@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Management</h1>
        <a href="{{ route('create-user') }}" class="btn btn-primary" role="button" aria-disabled="true">+ Add User</a>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped" id="userListing">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>
                        @if ($user['user_type'] == 1)
                            Admin
                        @else
                            Seller
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('delete-user', ['id' => $user['id']]) }}" class="btn btn-sm btn-danger deleteUser">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
