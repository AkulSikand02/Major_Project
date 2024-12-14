@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Machine</h1>
    </div>
    @if ($errors->has('logInErrors'))
        <div class="text-danger">
            <strong>{{ $errors->first('logInErrors') }}</strong>
        </div>
    @endif
    <form id="addUserForm" action="{{ route('assign-machine', ['machineId' => $machineId]) }}" method="POST">
        @csrf

        <table class="table table-striped" style="max-height: 500px; overflow:hidden" id="userListing">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>
                            <div class="form-group col-sm-12" element="div">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="{{ $user['id'] }}" name="users[]"
                                        role="switch" id="flexSwitchCheckDefault"
                                        @if ($assignUser->contains($user['id'])) checked @endif>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary py-2" type="submit">Assign User</button>
    </form>
@stop
