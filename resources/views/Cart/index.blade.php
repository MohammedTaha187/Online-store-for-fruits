@extends('layout')

@section('title', 'Cart')

@section('body')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove">Remove</th>
                                <th class="product-image">Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                <button type="submit" class="btn btn-danger">×</button>
                                            </form>
                                        </td>
                                        <td class="product-image"><img src="{{ $details['image'] ?? 'assets/img/default.png' }}" alt="{{ $details['name'] }}"></td>
                                        <td class="product-name">{{ $details['name'] }}</td>
                                        <td class="product-price">${{ $details['price'] }}</td>
                                        <td class="product-quantity">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $id }}">
                                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td class="product-total">${{ $details['price'] * $details['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Your cart is empty</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead>
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>${{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart', []))) }}</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="cart-buttons">
                        <a href="{{ route('shop') }}" class="boxed-btn">Continue Shopping</a>
                        {{-- <a href="{{ route('checkout') }}" class="boxed-btn black">Checkout</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->
@endsection
