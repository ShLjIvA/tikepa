<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(){
        return view('pages.order.checkout');
    }

    public function order(OrderRequest $request){
        $number = $request->input('number');
        $zip = $request->input('zip');
        $address = $request->input('address');
        $city = $request->input('city');

        $userId = $request->session()->get('user')->id;
        $total = $request->session()->get('total');

        try {
            if(session()->has('cartItems')){
                DB::beginTransaction();
                    $orderId = DB::table('orders')->insertGetId([
                        'user_id' => $userId,
                        'number' => $number,
                        'address' => $address,
                        'zip' => $zip,
                        'city' => $city,
                        'created_at' => now(),
                        'total' => $total
                    ]);
                    foreach(session()->get('cartItems') as $cartItem){
                        $size = $cartItem->size;
                        $productId = $cartItem->product->id;
                        $price = $cartItem->product->current_price;
                        DB::table('order_item')->insert([
                            'order_id' => $orderId,
                            'article_id' => $productId,
                            'size' => $size,
                            'price' => $price,
                        ]);
                    }
                DB::commit();
            }
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error-msg', $e->getMessage());
        }
        if(session()->has('cartItems')){
            session()->forget('cartItems');
        }
        return redirect()->back()->with('success-msg', "You successfully ordered!");

    }
}
