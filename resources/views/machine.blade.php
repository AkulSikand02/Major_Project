<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Machine</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        .card {
            margin-bottom: 20px;
        }

        .card-body {
            max-height: 400px;
            /* Set the maximum height for vertical scrolling */
            overflow-y: auto;
            /* Enable vertical scrolling when content overflows */
        }

        .card-image {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($promotions as $promotion)
                <div class="carousel-item active">
                    <img width="100" height="auto" src="{{ asset('storage/' . $promotion['image']) }}"
                        class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            @foreach ($machine->slots as $slot)
                <div class="col-md-4">
                    <div class="card">
                        <h2 class="text-center">{{ $slot['title'] }}</h2>
                        <div class="card-body">
                            @foreach ($slot['items'] as $item)
                                <div>
                                    <img class="card-image"
                                        src="{{ asset('storage/' . $item['image']) }}">
                                    <h4 class="mt-2">Title: {{ $item['title'] }}</h4>
                                    <p>Price ₹{{ $item['price'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</html>
