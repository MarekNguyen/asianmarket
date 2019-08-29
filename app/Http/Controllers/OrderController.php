<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Customer;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $today = Carbon::today()->toDateString();
        $orders = Order::where('created_at','>',Carbon::today())->get();
        return view('order.index',compact('orders','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all();
        return view('order.order',compact('customers'));
    }

    /**
     * create new customer 
     */

     public function createNewCustomer(){
         $customers = Customer::all();
         return view('order.customer',compact('customers'));
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        //
        
        return view('order.report');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportPost(Request $request)
    {
        $start = $request->start;
        $end = $request->end;   
        $orders = Order::whereBetween('created_at',[$start.' 00:00:00', $end.' 23:59:59'])->get();
        return view('order.reportfinal',compact('orders'));
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
        $orders = Order::where('created_at','>',Carbon::today())->get();
        $counterForName = count($orders) + 1;
        $customer_id = $request->customer_id;
        $price = $request->price;
        $total = $request->total;
        $order = Order::initialize($customer_id,$price,$total,$counterForName);

        return redirect()->route('order.show',$order->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomer(Request $request)
    {
        //
        $name = $request->name;
        $customer = new Customer(['name'=> $name]);
        $customer->save();
        return redirect()->route('customercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prepareList(Request $request)
    {
        //
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        return view('order.prepare',compact('order'));
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmList(Request $request)
    {
        //
        $order_id = $request->order_id;
        $order = Order::findOrFail($order_id);
        $order->status = 1 ;
        $order->update();
        return redirect()->route('order.index');
        
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
        $order = Order::findOrFail($id);
        return view('order.show',compact('order'));
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
        $order = Order::findOrFail($id);
        $products = $request->data;
        foreach ($products as $product) {
            $prod = Product::findOrFail($product['productId']);
            $prod->name = $product['name'];
            $prod->quantity = $product['quantity'];
            $prod->update();
        }
        if ($request->ajax()) {
            return response()->json(array('response' => $product['productId']));
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
