<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function products()
    {

        return $this->hasMany(Product::class );
    }


    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang;

    }
}
