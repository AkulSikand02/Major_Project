@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Machine Slot Item Management</h1>
        <a href="{{ route('create-machine-slot-item',['slotId' => $slotId]) }}" class="btn btn-primary" role="button" aria-disabled="true">+ Add Item</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped" id="userListing">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Added By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><img class="img" height="50" width="50" src="{{ asset("storage/".$item['image']) }}" alt=""></td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['user']->name }}</td>
                    <td>
                        <a href="{{ route('delete-machine-slot-item', ['id' => $item['id']]) }}"
                            class="btn btn-sm btn-danger deleteUser">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
