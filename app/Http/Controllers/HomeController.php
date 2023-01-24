<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Article;

class HomeController extends Controller
{
    public function index() {

        $model = new Article();

        $search = (object)[];

        $latest = $model->search($search);

        return view('pages.home', ['latest' => $latest]);
    }
}
