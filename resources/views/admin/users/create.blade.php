@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create User</h1>
    </div>
    @if ($errors->has('logInErrors'))
        <div class="text-danger">
            <strong>{{ $errors->first('logInErrors') }}</strong>
        </div>
    @endif
    <form id="addUserForm" action="{{ route('add-user') }}" method="POST">
        @csrf
        <div class="row">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-sm-12" element="div">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>Email address</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>User Type</label><br>
                        <select class="form-select form-control" aria-label="Default select example" name="user_type"
                            id="userType">
                            <option value="" disabled="disabled" selected="selected">PLEASE CHOOSE</option>
                            <option value="1">Admin</option>
                            <option value="2">Seller</option>
                        </select>
                        @if ($errors->has('user_type'))
                            <div class="text-danger">{{ $errors->first('user_type') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 p-3" element="div">
                        <button type="submit" class="btn btn-primary" name="addUserWithForm">Add user</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
