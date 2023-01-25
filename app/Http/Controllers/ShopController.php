<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $articles = Article::all();
        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();

        return view('pages.shop', ["articles" => $articles, "categories" => $categories ,"brands" => $brands, "genders" => $genders]);
    }

    public function show($id){
        $product = Article::find($id);
        return view('pages.products.product', ['product' => $product]);
    }
}
