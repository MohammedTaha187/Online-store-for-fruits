<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('Checkout.index' , [
            'orders' => $orders,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address_en' => 'required|string|max:255',
            'address_ar' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'say_something_en' => 'nullable|string|max:255',
            'say_something_ar' => 'nullable|string|max:255',
        ]);


        $user_id = auth()->check() ? auth()->id() : null;



        $order = Order::create([
            'user_id' => $user_id,
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'email' => $request->email,
            'address' => json_encode([
                'en' => $request->address_en,
                'ar' => $request->address_ar,
            ]),
            'phone' => $request->phone,
            'note' => json_encode([
                'en' => $request->say_something_en,
                'ar' => $request->say_something_ar,
            ]),
        ]);


        if (session()->has('cart')) {
            foreach (session('cart') as $item) {
                $order->orderDetails()->create([
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        session()->forget('cart');


        return redirect()->route('checkout.success')->with('success', 'Order placed successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
