@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Machine Management</h1>
        <a href="{{ route('create-machine') }}" class="btn btn-primary" role="button" aria-disabled="true">+ Add machine</a>

    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped" id="userListing">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $machine['title'] }}</td>
                    <td>
                        <a href="{{ route('assign-machine', ['machineId' => $machine['id']]) }}" class="btn btn-sm btn-primary"></i>&nbsp;Assign</a>&nbsp;&nbsp;
                        <a href="{{ route('slots', ['machineId' => $machine['id']]) }}" class="btn btn-sm btn-warning"></i>&nbsp;Slots</a>&nbsp;&nbsp;
                        <a href="{{ route('delete-machine', ['id' => $machine['id']]) }}" class="btn btn-sm btn-danger deleteUser">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
