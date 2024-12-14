@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Machine Slot Item</h1>
        <a href="{{ route('seller-slots', ['id' => $slotId]) }}" class="btn btn-primary" role="button" aria-disabled="true">Back</a>
    </div>
    @if ($errors->has('logInErrors'))
        <div class="text-danger">
            <strong>{{ $errors->first('logInErrors') }}</strong>
        </div>
    @endif
    <form id="addSlotItemForm" action="{{ route('add-machine-slot-item', ['slotId' => $slotId]) }}" method="POST"
        enctype="multipart/form-data">
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
                        <input type="hidden" name="machine_slot_id" value="{{ $slotId }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>

                    <div class="form-group col-sm-12" element="div">
                        <label>price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        @if ($errors->has('price'))
                            <div class="text-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-sm-12" element="div">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                        @if ($errors->has('quantity'))
                            <div class="text-danger">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12" element="div">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
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
