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

        return view('order_form', compact('dishes', 'tables'));
    }

    public function submit(Request $request){
        $data = array_filter($request->except('_token', 'table'));

        $orderId = rand();

        foreach ($data as $key => $value) {
           if($value > 1){
                for ($i=0; $i < $value; $i++) { 
                    $this->saveOrders($key, $request, $orderId);
                }
                }else{
                    $this->saveOrders($key, $request, $orderId);
           }
        }
        
        return redirect('/')->with('status', 'Order has successfully submitted.');
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
}
