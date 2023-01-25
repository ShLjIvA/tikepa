<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('pages.shop');
    }

    public function show($id){
        $product = Article::find($id);
        return view('pages.products.product', ['product' => $product]);
    }
}
