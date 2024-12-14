@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Machine Slots</h1>
        <a href="{{ route('seller-machines') }}" class="btn btn-primary" role="button" aria-disabled="true">Back</a>

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
            @foreach ($slots as $slot)
                <tr>
                    <td>{{ $slot['title'] }}</td>
                    <td>
                        <a href="{{ route('seller-slot-item', ['slotId' => $slot['id']]) }}" class="btn btn-sm btn-warning"></i>&nbsp;Items</a>&nbsp;&nbsp;
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop