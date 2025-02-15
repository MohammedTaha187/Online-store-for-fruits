<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // أو أي Model خاص بالبحث

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->back();
        }

        // البحث في المنتجات بناءً على الاسم أو الوصف
        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return view('search-results', compact('products', 'query'));
    }
}
