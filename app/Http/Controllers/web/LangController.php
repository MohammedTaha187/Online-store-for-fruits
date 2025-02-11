<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function setLang($lang, Request $request)
    {
        $acceptedLangs = ['en', 'ar'];

        if (!in_array($lang, $acceptedLangs)) {
            $lang = 'en';
        }

        // تخزين اللغة في الجلسة
        Session::put('lang', $lang);
        App::setLocale($lang);

        return back();
    }
}
