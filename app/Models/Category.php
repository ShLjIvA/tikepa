<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function search($search) {
        $query = DB::table('categories');

        if(property_exists($search, 'id')) {
            $query->where('id', $search->id);
        }


        if(property_exists($search, 'limit')) {
            $query->limit($search->limit);
        } else {
            $query->limit(10);
        }

        if(property_exists($search, 'skip')) {
            $query->skip($search->skip);
        }

        $categories = $query->get();
        return $categories;

    }

    public $timestamps = false;
}
