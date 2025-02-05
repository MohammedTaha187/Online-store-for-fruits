<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class );
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang;

    }
    public function desc(){

        $lang = App::getLocale();
        return json_decode($this->desc)->$lang;

    }
}
