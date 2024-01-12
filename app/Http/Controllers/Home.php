<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Home extends Controller
{
    public function index(): View {
        $recipes = Recipe::latest()->paginate(10);
        $categories = Categories::all();

        return view('pages.home', compact('recipes', 'categories'));
    }
}
