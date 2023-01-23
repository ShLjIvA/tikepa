<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request): bool
    {

        if($request->session()->has("cart")) {
            $cart = $request->session()->get("cart");

            if(isset($cart[$request->productId])) {
                $cart[$request->productId] = $cart[$request->productId]+1;
            } else {
                $cart[$request->productId] = 1;
            }
            $request->session()->put("cart", $cart);

        } else {
            $cart = [];
            $productId = $request->productId;
            //dd($productId);
            $key = strval($productId);
            $cart[$key] = 1;
            $request->session()->put("cart", $cart);
        }

        return true;
    }
}
