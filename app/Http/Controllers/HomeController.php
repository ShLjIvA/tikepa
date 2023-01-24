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

        $searchComing = (object)[];
        $searchComing->coming = 1;
        $coming = $model->search($searchComing);

        $searchSale = (object)[];
        $searchSale->sale = 1;
        $sale = $model->search($searchSale);

        return view('pages.home', ['latest' => $latest, 'coming' => $coming, 'sale' => $sale]);
    }
}
