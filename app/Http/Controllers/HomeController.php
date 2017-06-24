<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Order_Detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \DB::table('categories')->take(2)->get();
        $products_category = [];
        foreach ($categories as $category) {
            $products = \DB::table('products')
                        ->where('products.category', '=', $category->id)
                        ->take(6)
                        ->get();
            $category->products = $products;          
        }
        return view('home')->withcategories($categories);
    }

    public function order()
    {
        return view('homes.order');
    }

    public function process()
    {
        if(isset($_POST)){
            if(isset($_POST['custom_phone'])){
                $customer = new Customer;
                $customer->name = $_POST['custom_name'];
                $customer->email = $_POST['custom_email'];
                $customer->phone = $_POST['custom_phone'];

                if($customer->save()){
                    if(isset($_POST['order'])){
                        $order = $_POST['order'];
                        $dataIns = json_decode($order, true);
                        $order = new Order;
                        $order->user_id = $customer->id;
                        $order->created_at = date("Y-m-d H:i:s");
                        $order->status = 0;
                        if($order->save()){
                            foreach ($dataIns as $dataIn) {
                                $order_detail = new Order_Detail;
                                $order_detail->order_id = $order->id;
                                $order_detail->product_id = $dataIn["id"];
                                $order_detail->name = $dataIn["name"];
                                $order_detail->number = $dataIn["numb"];
                                $order_detail->price = $dataIn["price"];
                                $order_detail->save();
                            }                    
                        }
                    }
                    return response()->json([
                        'status' => '200',
                        'message' => 'OK'
                    ]);
                }

                return response()->json([
                        'status' => '400',
                        'message' => 'Bad Request'
                    ]);
            }
        }
        return response()->json([
            'status' => '200',
            'message' => 'OK'
        ]);
    }
}
