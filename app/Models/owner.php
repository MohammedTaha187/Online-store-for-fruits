<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class owner extends Model
{
    /** @use HasFactory<\Database\Factories\OwnerFactory> */
    use HasFactory;
    protected $guarded = ['id' , 'created_at' , 'updated_at'];


public function name(){

    $lang = App::getLocale();
    return json_decode($this->name)->$lang;

}

public function title(){

    $lang = App::getLocale();
    return json_decode($this->title)->$lang;

}



}
