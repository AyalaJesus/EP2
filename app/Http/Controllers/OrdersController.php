<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Order_product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(2);
        return view("orders.index",['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shopping_cart = \Session::get('cart.orderProduct');
        if($shopping_cart){
          $total = Order_product::total();
          $productsSize = Order_product::productsSize();
        }else {
          $total = 0;
          $productsSize = 0;
          $shopping_cart = array();
        }
        $products = Product::paginate(10);
        return view("orders.create",['shopping_cart'=>$shopping_cart,'total'=>$total,'productsSize'=>$productsSize,'products'=>$products]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->status = $request->status;
        if($order->save()){
          $total = 0;
          $productsSize = 0;
          $shopping_cart = array();
          return view('addresses.create');
        }else{
          return view('orders.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::find($id);
        return view('orders.edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Order::find($id);
        $order->id = $request->id;
        $order->user_id = $request->user_id;
        if($request->status==0)
          $order->status = "Pendiente";
        else
          $order->status = "Completado";

        if ($order->save()) {
          return redirect('/orders');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
