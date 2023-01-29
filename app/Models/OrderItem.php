<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public $timestamps = false;

    use HasFactory;
}
