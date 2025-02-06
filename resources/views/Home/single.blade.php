@extends("layout")

@section("title")
    Single_Products
@endsection

@section("body")
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>{{ $prod->name() }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset("uploads/" . $prod->image) }}" alt="{{ $prod->name }}">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $prod->name() }}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> ${{ $prod->price }}</p>
                       <p>{{ $prod->desc() }}</p>

                        <div class="single-product-form">
                            <form action="{{ route('cart.add', $prod->id) }}" method="POST">                                @csrf
                                <div class="input-group">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control" placeholder="Quantity">
                                    <button type="submit" class="custom-btn">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </div>
                            </form>
                            
                                <p><strong>Categories: </strong>{{ $prod->category->name() }}</p>
                        </div>
                        <h4>Talk to us:</h4>
                        <ul class="product-share">
                            <li><a href="https://web.facebook.com/profile.php?id=100008541101034&locale=ar_AR"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://github.com/MohammedTaha187"><i class="fab fa-github"></i></a></li>
                            <li><a href="mailto:engmohammed1872@gmail.com"><i class="fas fa-envelope"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/engmohammed18/ "><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->
@endsection
