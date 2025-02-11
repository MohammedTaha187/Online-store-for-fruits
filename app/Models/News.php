<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang;

    }
    public function title(){

        $lang = App::getLocale();
        return json_decode($this->title)->$lang;

    }
    public function content(){

        $lang = App::getLocale();
        return json_decode($this->content)->$lang;

    }
    public function author(){

        $lang = App::getLocale();
        return json_decode($this->author)->$lang;

    }
}
