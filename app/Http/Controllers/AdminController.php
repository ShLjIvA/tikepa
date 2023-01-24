<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class AdminController extends Controller
{
    public function index() {
        return view('admin.articles');
    }

    public function articles(Request $request) {
        $count = Article::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new Article();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $articles = $model->search($search);
        
        return view('admin.articles', ['articles' => $articles, 'pagination' => $pagination, 'page' => $page]);
    }

    public function brands() {
        return view('admin.brands');
    }

    public function categories() {
        return view('admin.categories');
    }

    public function links() {
        return view('admin.links');
    }

    public function orders() {
        return view('admin.orders');
    }

    public function users() {
        return view('admin.users');
    }
}
