<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function name(){

        $lang = App::getLocale();
        return json_decode($this->name)->$lang;

    }
}
