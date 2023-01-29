<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Traits\Logging;

class CartController extends Controller
{
    use Logging;
    public function index(){
        $subtotal = 0.00;
        if(session()->has('cartItems')){
            $cartItems = session()->get('cartItems');
            foreach ($cartItems as $item){
                $subtotal += $item->product->current_price;
            }
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

        if(session()->has('user')) {
            $user = session()->get('user');
            $this->insertLog($user->id, 'Add To Cart', $request->getUri());
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

    public function remove(Request $request, $id){
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

            if(session()->has('user')) {
                $user = session()->get('user');
                $this->insertLog($user->id, 'Remove From Cart', $request->getUri());
            }
        }

        return redirect()->back()->with(['cartItems' => session()->get('carItems')]);

    }
}
