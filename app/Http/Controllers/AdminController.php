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

    public function updateBrand(Request $request, $id) {
        $name = $request->input('brand_name');

        $brand = Brand::find($id);
        $brand->name = $name ? $name : $brand->name;
        $brand->save();

        return redirect()->route('brands');
    }

    public function addBrand(Request $request) {
        $name = $request->input('brand_name');

        if(!$name) {
            return redirect()->route('brands');        
        }

        $brand = new Brand();
        $brand->name = $name;
        $brand->save();

        return redirect()->route('brands');
    }

    public function deleteBrand(Request $request, $id) {

        $brand = Brand::find($id);
        $brand->forceDelete();

        return redirect()->route('brands');

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

    public function updateCategory(Request $request, $id) {
        $name = $request->input('category_name');

        $category = Category::find($id);
        $category->name = $name ? $name : $category->name;
        $category->save();

        return redirect()->route('categories');
    }

    public function addCategory(Request $request) {
        $name = $request->input('category_name');

        if(!$name) {
            return redirect()->route('categories');
        }

        $category = new Category();
        $category->name = $name;
        $category->save();

        return redirect()->route('categories');
    }

    public function deleteCategory(Request $request, $id) {

        $category = Category::find($id);
        $category->forceDelete();

        return redirect()->route('categories');

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

    public function updateGender(Request $request, $id) {
        $name = $request->input('gender_name');

        $gender = Gender::find($id);
        $gender->gender = $name ? $name : $gender->gender;
        $gender->save();

        return redirect()->route('genders');
    }

    public function addGender(Request $request) {
        $name = $request->input('gender_name');

        if(!$name) {
            return redirect()->route('genders');
        }

        $gender = new Gender();
        $gender->gender = $name;
        $gender->save();

    }

    public function deleteGender(Request $request, $id) {

        $gender = Gender::find($id);
        $gender->forceDelete();

        return redirect()->route('genders');

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

    public function updateLink(Request $request, $id) {
        $name = $request->input('link_name');
        $title = $request->input('title');
        $admin = $request->input('admin') ? 1 : 0;

        $link = Link::find($id);
        $link->title = $title ? $title : $link->title;
        $link->name = $name ? $name : $link->name;
        $link->admin = $admin;
        $link->save();

        return redirect()->route('links');
    }

    public function addLink(Request $request) {
        $name = $request->input('link_name');
        $title = $request->input('title');
        $admin = $request->input('admin') ? 1 : 0;
        if(!$name || !$title) {
            return redirect()->route('links');
        }

        $link = new Link();
        $link->name = $name;
        $link->title = $title;
        $link->admin = $admin;


        $link->save();

        return redirect()->route('links');

    }

    public function deleteLink(Request $request, $id) {

        $link = Link::find($id);
        $link->forceDelete();

        return redirect()->route('links');

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
