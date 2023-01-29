<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function search($search) {
        $query = DB::table('logs')
            ->join('users', 'logs.user_id', '=', 'users.id');

        if(property_exists($search, 'start_date')) {
            $query->where('logs.created_at', ">=", $search->start_date);
        }
        if(property_exists($search, 'end_date')) {
            $query->where('logs.created_at', "<=", $search->end_date);
        }

        $query->orderBy('logs.id', 'desc');

        $articles = $query->paginate(20);
        return $articles;
    }

    use HasFactory;
}
