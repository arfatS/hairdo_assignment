<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $orders = Order::all();
        }
        if(auth()->user()->role == 'seller'){
            $orders = Website::join('orders', 'orders.website_id', 'websites.id')
                            ->where('seller_id', auth()->user()->id)->get();
        }
     
        if (auth()->user()->role == 'buyer') {
            $orders = Order::where('buyer_id', auth()->user()->id)->get();
        }

        foreach ($orders as $order) {
            $order->buyer = User::find($order->buyer_id);
            $order->website = Website::find($order->website_id);
        }

        return view('orders.index',compact('orders'));
    }

    public function view($id)
    {
        $order = Order::find($id);
        $order->buyer = User::find($order->buyer_id);
        $order->website = Website::find($order->website_id);
        return view('orders.view', compact('order'));
    }

    public function confirm($id)
    {
        if (auth()->user()->role == 'buyer') {
            return redirect('/home');
        }
        $order = Order::find($id);
        $order->confirmed = true;
        $order->save();

        return redirect('/orders')->with('success', 'Order ' . $order->blog_post_name . ' has been confirmed');

    }

    public function order($id)
    {
        $website = Website::find($id);
        return view('orders.order', compact('website'));
    }

    public function postOrder(Request $request, $id)
    {
        Order::create([
            'buyer_id' => auth()->user()->id,
            'website_id' => $id,
            'blog_post_name' => $request->blog_post_name,
            'blog_post_article' => $request->blog_post_article,
        ]);

        return redirect('/orders')->with('success', 'Order placed successfully');

    }
}
