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
                                    <td>
                                        <img src="{{ asset('uploads/' . $details['image'] ?? 'default.jpg') }}" alt="" style="width: 100px; height: auto;">
                                    </td>
                                    <td class="product-name">
                                        @php
                                            $name = json_decode($details['name'], true);
                                            $localizedName = $name[app()->getLocale()] ?? 'No name available'; 
                                        @endphp
                                        {{ $localizedName }}
                                    </td>
                                    <td class="product-price">${{ $details['price'] ?? 0 }}</td>
                                    <td class="product-quantity">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input type="number" name="quantity" value="{{ $details['quantity'] ?? 1 }}" min="1">
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
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>
                                        ${{ number_format($subtotal = collect(session('cart'))->sum(function($item) {
                                            return $item['price'] * $item['quantity'];
                                        }), 2) }}
                                    </td>
                                </tr>
                        
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>
                                        @php
                                            // إذا كانت السلة تحتوي على أكثر من منتج، نحسب الشحن بناءً على أول منتج
                                            $shippingMethod = collect(session('cart'))->first()['shipping_method'] ?? 'free'; 
                                            $shippingCost = collect(session('cart'))->sum(function($item) {
                                                return $item['shipping_method'] === 'free' ? 0 : $item['shipping_cost'];
                                            });
                                        @endphp
                        
                                        @if($shippingMethod === 'free')
                                            Free
                                        @else
                                            ${{ number_format($shippingCost, 2) }}
                                        @endif
                                    </td>
                                </tr>
                        
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>
                                        ${{ number_format($subtotal + $shippingCost, 2) }}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Your cart is empty</td>
                                </tr>
                            @endif
                        </tbody>
                        
                    </table>
                    <div class="cart-buttons">
                        @if(session('cart'))
                        <a href="checkout.html" class="boxed-btn black">Check Out</a>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end cart -->
@endsection
