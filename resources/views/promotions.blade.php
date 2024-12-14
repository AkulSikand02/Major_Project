@extends('layout')

@section('content')
    <div class="row">
        @foreach ($promotions as $promotion)
            <div class="card-deck mt-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('storage/' . $promotion->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $promotion->title }}</h5>
                        <p class="card-text">{{ $promotion->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $promotion->created_at }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
