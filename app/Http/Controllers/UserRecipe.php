<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Recipe;
use App\Models\ReplyComments;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserRecipe extends Controller
{
    public function index(): View {
        $recipes = Recipe::all();

        return view('pages.recipe', compact('recipes'));
    }

    public function show(string $slug_recipe): View {
        $recipe = Recipe::where('slug', $slug_recipe)->first();
        $comments = Comments::where('recipeId', $recipe->id)->latest()->get();
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

        return redirect()->route('resep.show', $request->recipeId)->with('success', 'Komentar Berhasil Ditambahkan');
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
