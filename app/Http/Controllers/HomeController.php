<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'title' => "Home",
            'active' => "home",
            'product' => Product::all()
        ]);
    }

    public function detail($id) {
        return view('home.detail', [
            'title' => "Detail",
            'active' => "home",
            'product' => Product::find($id),
            'category' => Category::all()
        ]);
    }
}
