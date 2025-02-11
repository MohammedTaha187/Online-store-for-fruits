<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function product()
    {

        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang;

    }
    public function comment(){

        $lang = App::getLocale();
        return json_decode($this->comment)->$lang;

    }
}
