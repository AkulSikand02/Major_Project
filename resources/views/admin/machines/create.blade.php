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
    <form id="addUserForm" action="{{ route('add-machine') }}" method="POST">
        @csrf
        <div class="row">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-sm-12" element="div">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 p-3" element="div">
                        <button type="submit" class="btn btn-primary" name="addUserWithForm">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
