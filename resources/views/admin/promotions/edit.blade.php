@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Promotion</h1>
    </div>
    @if ($errors->has('logInErrors'))
        <div class="text-danger">
            <strong>{{ $errors->first('logInErrors') }}</strong>
        </div>
    @endif
    <form id="editPromotionForm" action="{{ route('update-promotions', ['id' => $promotion['id']]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-sm-12" element="div">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $promotion->title }}">
                        @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $promotion->description }}</textarea>
                        @if ($errors->has('description'))
                            <div class="text-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                        @if ($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" name="display_on_machine" role="switch"
                                id="flexSwitchCheckDefault"
                                @if ($promotion->display_on_machine)
                                    checked
                                @endif>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Display on machine</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 p-3" element="div">
                        <button type="submit" class="btn btn-primary" name="addUserWithForm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
