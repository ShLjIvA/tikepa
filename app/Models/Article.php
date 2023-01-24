<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{

    public function search($search) {
        $query = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->join('genders', 'articles.gender_id', '=', 'genders.id')
            ->join('brands', 'articles.brand_id', '=', 'brands.id')
            ->select('articles.*', 'categories.name as categoryName', 'genders.*', 'brands.name as brandName');

        if(property_exists($search, 'id')) {
            $query->where('articles.id', $search->id);
        }
        if(property_exists($search, 'categoryId')) {
            $query->where('categories.id', $search->categoryId);
        }

        if(property_exists($search, 'brandId')) {
            $query->where('brands.id', $search->brandId);
        }

        if(property_exists($search, 'genderId')) {
            $query->where('genders.id', $search->genderId);
        }

        $query->orderBy('articles.id', 'desc');

        if(property_exists($search, 'limit')) {
            $query->limit($search->limit);
        } else {
            $query->limit(8);
        }

        if(property_exists($search, 'skip')) {
            $query->skip($search->skip);
        }

        $articles = $query->get();
        return $articles;


    }

    use HasFactory;
}
