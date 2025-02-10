<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;
    protected $guarded = ['id' , 'created_at' , 'updated_at'];


    public function shop_address(){

        $lang = App::getLocale();
        return json_decode($this->shop_address)->$lang;

    }

    public function country_name(){

        $lang = App::getLocale();
        return json_decode($this->country_name)->$lang;

    }

    public function shop_hours(){

        $lang = App::getLocale();
        return json_decode($this->shop_hours)->$lang;

    }
    public function contact_phone(){

        $lang = App::getLocale();
        return json_decode($this->contact_phone)->$lang;

    }
    public function contact_email(){

        $lang = App::getLocale();
        return json_decode($this->contact_email)->$lang;

    }

}
