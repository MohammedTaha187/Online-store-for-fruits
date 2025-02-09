@extends('layout')

@section('title')
    Checkout
@endsection

@section('body')

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Check Out Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{ route('order.store') }}" method="POST">
                                                @csrf
                                                <p><input type="text" name="name" placeholder="Name" required></p>
                                                <p><input type="email" name="email" placeholder="Email" required></p>
                                                <p><input type="text" name="address" placeholder="Address" required></p>
                                                <p><input type="tel" name="phone" placeholder="Phone" required></p>
                                                <p><textarea name="say_something" placeholder="Say Something "></textarea></p>

                                                <button type="submit" class="boxed-btn black">Place Order</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Your shipping address form is here.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card single-accordion">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Card Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Your card details go here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap p-3 shadow rounded">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session('cart') && count(session('cart')) > 0)
                                        @php
                                            $subtotal = 0;
                                            $shippingCost = 0;
                                        @endphp

                                        @foreach(session('cart') as $item)
                                            <tr>
                                                @php
    $name = json_decode($item['name'], true);
    $lang = app()->getLocale();
@endphp

<td>{{ $name[$lang] ?? $name['en'] }} (x{{ $item['quantity'] }})</td>

                                                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            </tr>
                                            @php
                                                $subtotal += $item['price'] * $item['quantity'];
                                                $shippingCost += ($item['shipping_method'] === 'free') ? 0 : $item['shipping_cost'];
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Your cart is empty</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(session('cart') && count(session('cart')) > 0)
                                        <tr>
                                            <td><strong>Subtotal:</strong></td>
                                            <td>${{ number_format($subtotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Shipping:</strong></td>
                                            <td>{{ $shippingCost > 0 ? '$'.number_format($shippingCost, 2) : 'Free' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total:</strong></td>
                                            <td>${{ number_format($subtotal + $shippingCost, 2) }}</td>
                                        </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end check out section -->

@endsection
