<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Link extends Model
{

    public function search($search) {
        $query = DB::table('links');

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

        $links = $query->get();
        return $links;

    }

    public $timestamps = false;
    use HasFactory;
}
