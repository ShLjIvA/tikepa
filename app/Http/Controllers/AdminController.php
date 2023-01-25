<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\User;
use App\Models\Link;

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

    public function brands(Request $request) {

        $count = Brand::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new Brand();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $brands = $model->search($search);
        
        return view('admin.brands', ['brands' => $brands, 'pagination' => $pagination, 'page' => $page]);

    }

    public function categories(Request $request) {
        $count = Category::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new Category();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $categories = $model->search($search);
        
        return view('admin.categories', ['categories' => $categories, 'pagination' => $pagination, 'page' => $page]);
    }

    public function genders(Request $request) {
        $count = Gender::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new Gender();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $genders = $model->search($search);
        
        return view('admin.genders', ['genders' => $genders, 'pagination' => $pagination, 'page' => $page]);
    }

    public function links(Request $request) {
        $count = Link::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new link();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $links = $model->search($search);
        
        return view('admin.links', ['links' => $links, 'pagination' => $pagination, 'page' => $page]);
    }

    public function orders() {
        return view('admin.orders');
    }

    public function users(Request $request) {
        $count = User::count();

        $page = (int)$request->query('page');
        
        if(!$page) {
            $page = 1;
        }

        $pagination = (int)ceil($count / 10);

        $model = new User();

        $search = (object)[];

        $search->limit = 10;

        $search->skip = ($page - 1)*10;

        $users = $model->search($search);
        
        return view('admin.users', ['users' => $users, 'pagination' => $pagination, 'page' => $page]);
    }
}
