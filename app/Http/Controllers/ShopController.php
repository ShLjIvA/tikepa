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
        $model = new Article();

        $articles = $model->search((object)["sort" => "new"]);
        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();

        return view('pages.shop', ["articles" => $articles, "categories" => $categories ,"brands" => $brands, "genders" => $genders]);
    }

    public function show($id){
        $product = Article::find($id);
        return view('pages.products.product', ['product' => $product]);
    }

    public function search(Request $request){

        $search = $request->input('search_input');

        $articles = Article::orderByDesc('id')
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->limit(6)
            ->get();
        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();

        return view('pages.shop', ["articles" => $articles, "categories" => $categories ,"brands" => $brands, "genders" => $genders]);
    }

    public function searchApi(Request $request){

        $model = new Article();

        $search = (object)$request->all();

        $articles = $model->search($search);

        return $articles;


    }
}
