<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\User;
use App\Models\Link;
use App\Models\ArticleGallery;
use App\Models\ArticleSize;
use App\Models\Size;
use App\Models\Log;
use App\Models\Order;

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

        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();
        
        return view('admin.articles', ['articles' => $articles, 'pagination' => $pagination, 'page' => $page, 'brands' => $brands, 'genders' => $genders, 'categories' => $categories]);
    }

    public function article(Request $request, $id) {

        $article = Article::find($id);
        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.article', ['article' => $article, 'brands' => $brands, 'genders' => $genders, 'categories' => $categories, 'sizes' => $sizes]);
    }

    public function updateArticle(Request $request, $id) {
        $article = Article::find($id);

        $name = $request->input('name');
        $brand = (int)$request->input('brand');
        $category = (int)$request->input('category');
        $gender = (int)$request->input('gender');
        $description = $request->input('description');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');

        if($request->file('image')) {
            $image = time().'_tikepa'.'.'.$request->file('image')->extension();
            $request->image->move(public_path('img/products/'), $image);
            $article->image = 'img/products/'.$image;
        }

        $article->name = $name;
        $article->brand_id = $brand;
        $article->category_id = $category;
        $article->gender_id = $gender;
        $article->description = $description;
        $article->price = $price;
        $article->sale_price = $sale_price;

        $article->save();

        return redirect('admin/article/'.$id);
    }

    public function addArticle(Request $request) {
        $name = $request->input('name');
        $brand = $request->input('brand');
        $category = $request->input('category');
        $gender = $request->input('gender');
        $description = $request->input('description');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $image = time().'_tikepa'.'.'.$request->file('image')->extension();
        $request->image->move(public_path('img/products/'), $image);

        $article = new Article();
        $article->name = $name;
        $article->brand_id = $brand;
        $article->category_id = $category;
        $article->gender_id = $gender;
        $article->description = $description;
        $article->price = $price;
        $article->sale_price = $sale_price;
        $article->image = 'img/products/'.$image;
        $article->save();

        return redirect()->route('articles');

    }

    public function deleteArticle(Request $request, $id) {
        $article = Article::find($id);
        $article->forceDelete();

        return redirect()->route('articles');
    }

    public function addImage(Request $request, $id) {
        if($request->file('image')) {
            $path = time().'_tikepa'.'.'.$request->file('image')->extension();
            $request->image->move(public_path('img/products/'), $path);
            $image = new ArticleGallery();
            $image->url = 'img/products/'.$path;
            $image->article_id = $id;
            $image->save();
        }

        return redirect('admin/article/'.$id);
    }

    public function removeImage(Request $request, $id) {
        $image = ArticleGallery::find($id);
        $article_id = $image->article_id;
        $image->forceDelete();

        return redirect('admin/article/'.$article_id);
    }

    public function addSize(Request $request, $id) {
        if($request->input('size')) {
            $size_id = $request->input('size');
            $existingSize = DB::table('article_size')
                ->where('size_id', '=', $size_id)
                ->where('article_id', '=', $id)
                ->first();
            if($existingSize) {
                return redirect('admin/article/'.$id);
            }
            
            DB::table('article_size')->insert([
                ['size_id' => $size_id, 'article_id' => $id] 
            ]);

        }

        return redirect('admin/article/'.$id);
    }

    public function removeSize(Request $request, $id, $sizeId) {
        var_dump($id);
        var_dump($sizeId);
        $existingSize = DB::table('article_size')
                ->where('size_id', '=', $sizeId)
                ->where('article_id', '=', $id)
                ->delete();

            return redirect('admin/article/'.$id);
        
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

        $model = new Order();
        $search = (object)[];

        $orders = $model->search($search);

        return view('admin.orders', ['orders' => $orders]);
    }

    public function show(Request $request, $id) {
        $order = Order::find($id);

        return view('admin.order', ['order' => $order]);
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

    public function updateUser(Request $request, $id) {

        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $admin = (int)$request->input('admin');

        $user = User::find($id);
        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->admin = $admin;

        $user->save();

        return redirect()->route('users');
    }

    public function deleteUser(Request $request, $id) {
        $user = User::find($id);
        $user->forceDelete();

        return redirect()->route('users');
    }

    public function logs(Request $request) {
        $model = new Log();
        $search = (object)[];

        if($request->start_date) {
            $search->start_date = $request->start_date;
        } 

        if($request->end_date) {
            $search->end_date = $request->end_date;
        }

        $logs = $model->search($search);



        return view('admin.logs', ['logs' => $logs]);
    }
}
