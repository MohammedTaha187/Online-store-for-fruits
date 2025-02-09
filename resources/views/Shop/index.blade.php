@extends("layout")

@section("title")
    Shop
@endsection

@section("body")
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>

                            @foreach ($cats as $cat)
                            <li><a href="{{ route('categories.show', $cat['id']) }}">@php
                                $name = json_decode($cat->name, true);
                                $lang = app()->getLocale();
                            @endphp

                            {{ $name[$lang] ?? $name['en'] }} 
                            </a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">

                @foreach ($prods as $prod)
                    <div class="col-lg-4 col-md-6 text-center {{ $prod->category->slug }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('product.show', $prod->id) }}">
                                    <img src="{{ asset('uploads/' . $prod->image) }}" alt="{{ $prod->name() }}">
                                </a>
                            </div>
                            <h3>{{ $prod->name() }}</h3>
                            <p class="product-price"><span>Per Kg</span> ${{ $prod->price }} </p>
                            <a href="{{ route('cart.add', $prod->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- end products -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
