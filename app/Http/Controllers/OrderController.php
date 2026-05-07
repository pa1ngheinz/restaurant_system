<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $dishes = Dish::orderBy('id', 'desc')->get();
        $tables = Table::all();
        $orders = Order::where('status', 4)->get();
        $rawStatus = config('res.order_status');
        $status = array_flip($rawStatus);

        return view('order_form', compact('dishes', 'tables', 'orders', 'status'));
    }

    public function submit(Request $request){
        $data = array_filter($request->except('_token', 'table'));
        $orderId = rand();

        if($data){
            foreach ($data as $key => $value) {
               if($value > 1){
                    for ($i=0; $i < $value; $i++) { 
                        $smth = 'Hello';
                        dd($smth);
                        $this->saveOrders($key, $request, $orderId);
                }
                }else{
                    $this->saveOrders($key, $request, $orderId);
                }
            }
            return redirect('/')->with('status', 'Order has successfully submitted.');
        }else{
            return redirect('/')->with('empty', 'Please select dish to order!');
        }

        
    }

    //Redue code for database inserting as a function
    public function saveOrders($dish_id, $request, $order_id){
        $order = new Order();
        $order->order_id = $order_id;
        $order->dish_id = $dish_id;
        $order->table_id = $request->integer('table');
        $order->status = config('res.order_status.new');
        $order->save();
    }

    public function serve(Order $order){
        $order->status = config('res.order_status.done');
        $order->save();

        return redirect('/order')->with('success', 'Order dish was successfully served to customers.');
    }
}
