<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function gallery(){
        return $this->hasMany(ArticleGallery::class);
    }

    public function search($search) {

        $query = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->join('genders', 'articles.gender_id', '=', 'genders.id')
            ->join('brands', 'articles.brand_id', '=', 'brands.id')
            ->select('articles.*', 'categories.name as categoryName', 'categories.id as categoryId', 'genders.gender as gender', 'brands.name as brandName');

        if(property_exists($search, 'search')) {
            $query->where('articles.name', 'LIKE', "%{$search->search}%");
            $query->orWhere('articles.description', 'LIKE', "%{$search->search}%");
        }

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

        if(property_exists($search, 'coming')) {
            $query->where('articles.coming', $search->coming);
        }

        if(property_exists($search, 'sale')) {
            $query->whereNotNull('articles.sale_price');
        }

        if(property_exists($search, 'lower') && property_exists($search, 'upper') ) {
            $query->whereBetween('articles.current_price', [$search->lower, $search->upper]);
        }

        if(property_exists($search, 'sort')) {

            if($search->sort == 'new')
                $query->orderBy('articles.id', 'desc');
            if($search->sort == 'low') {
                $query->orderBy('articles.current_price');
            }
            if($search->sort == 'high'){
                $query->orderBy('articles.current_price', "desc");
            }
        }
        else{
            $query->orderBy('articles.id', 'desc');
        }

//        if(property_exists($search, 'limit')) {
//            $query->limit($search->limit);
//        } else {
//            $query->limit(9);
//        }

        if(property_exists($search, 'skip')) {
            $query->skip($search->skip);
        }

        $articles = $query->paginate(6);
        return $articles;


    }

    public $timestamps = false;
    use HasFactory;
}
