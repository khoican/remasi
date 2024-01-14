<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Comments;
use Illuminate\View\View;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ReplyComments;

class UserRecipe extends Controller
{
    public function index(): View {
        $recipes = Recipe::latest()->get();
        return view('pages.recipe', compact('recipes'));
    }

    public function getCategory(string $slug_category): View {
        $category = Categories::where('slug', $slug_category)->first();

        if ($category == null) {
            abort(404);
        }

        $recipes = Recipe::where('categoryId', $category->id)->get();

        return view('pages.recipe', compact('recipes', 'category'));
    }

    public function show(string $slug_recipe): View {
        $recipe = Recipe::where('slug', $slug_recipe)->first();

        if ($recipe == null) {
            abort(404);
        }

        $comments = Comments::where('recipeId', $recipe->id)->get();
        $replies = ReplyComments::all();

        return view('pages.detailRecipe', compact('recipe', 'comments', 'replies'));
    }

    public function comment(Request $request) {
        $request->validate([
            'userId' => 'required',
            'recipeId' => 'required',
            'comment' => 'required'
        ]);

        Comments::create([
            'userId' => $request->input('userId'),
            'recipeId' => $request->input('recipeId'),
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Komentar Berhasil Ditambahkan');
    }

    public function reply(Request $request) {
        $request->validate([
            'userId' => 'required',
            'commentId' => 'required',
            'comment' => 'required'
        ]);

        ReplyComments::create([
            'userId' => $request->userId,
            'commentId' => $request->commentId,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Balasan Berhasil Ditambahkan');
    }
}
