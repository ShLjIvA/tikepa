<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $subtotal = 0.00;
        if(session()->has('cartItems')){
            $cartItems = session()->get('cartItems');
            foreach ($cartItems as $item){
                $subtotal += $item->product->current_price;
            }
            session()->put('total', $subtotal);
        }
        return view('pages.cart', ['subtotal' => $subtotal]);
    }

    public function add(Request $request)
    {
        $received = (object)$request->all();

        $cartItems = session()->get('cartItems');
        if(!$cartItems){
            $cartItems = [];
        }

        $existingIndex = null;
        foreach($cartItems as $index => $item){
            if($item->product->id == $received->productId){
                $existingIndex = $index; // 0 1 2
                break;
            }
        }
        if($existingIndex !== null){
                return false;
        }

        else {
//            $cart = [];
//            $productId = $received->productId;
//            $key = strval($productId);
//            $cart[$key] = $received->size;
//            $request->session()->put("cart", $cart);

            $article = Article::find($received->productId);
            $cartItem = new \stdClass();
            $cartItem->size = $request->size;
            $cartItem->product = $article;
            array_push($cartItems, $cartItem);
            session()->put('cartItems', $cartItems);
        }

        return true;
    }

    public function remove($id){
        $existingIndex = null;
        if(session()->has('cartItems')) {
            $cartItems = session()->get('cartItems');
            foreach ($cartItems as $index => $item) {
                if ($item->product->id == $id) {
                    $existingIndex = $index; // 0 1 2
                    break;
                }
            }
            if($existingIndex !== null){
                unset($cartItems[$existingIndex]);
                session()->forget('carItems');
                session()->put('carItems', $cartItems);
            }
        }

        return redirect()->back()->with(['cartItems' => session()->get('carItems')]);

    }
}
