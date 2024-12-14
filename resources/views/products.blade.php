@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Your Store!</h1>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($promotions as $key => $promotion)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $promotion['image']) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @foreach ($machine->slots as $slot)
        <h2 class="text-center">{{ Str::ucfirst($slot['title']) }}</h2>
        <div class="row ">
            @foreach ($slot['items'] as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('storage/' . $product['image']) }}" alt="">
                        <div class="caption">
                            <h4>{{ $product['title'] }}</h4>
                            <p><strong>Price: </strong> ₹{{ $product['price'] }}</p>
                            <p class="btn-holder"><a href="{{ route('add.to.cart', $product['id']) }}"
                                    class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
