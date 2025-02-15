<?php
namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class LangController extends Controller
{
    public function switchLocale(Request $request, $locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
          
            if ($request->user()) {
                $request->user()->update(['locale' => $locale]);
            }

            // حفظ اللغة في الجلسة
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
