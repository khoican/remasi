<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Recipe as ModelsRecipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Recipe extends Controller
{
    public function index(): View {
        $recipes = ModelsRecipe::latest()->paginate(10);
        $categories = Categories::all();

        return view('pages.dashboard', compact('recipes', 'categories'));
    }

    public function create(): View {
        $categories = Categories::all();

        return view('pages.addRecipe', compact('categories'));
    }

    public function store(Request $request): RedirectResponse {

        $this -> validate($request, [
            'categoryId' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'nutritions' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/recipe', $image->hashName());

        ModelsRecipe::create([
            'categoryId' => $request -> categoryId,
            'name' => $request -> name,
            'image' => $image->hashName(),
            'description' => $request -> description,
            'ingredients' => $request -> ingredients,
            'instructions' => $request -> instructions,
            'nutritions' => $request -> nutritions,
        ]);

        return redirect()->route('admin.index')->with('success', 'Resep Berhasil Ditambahkan');
    }

    public function edit(string $id): View {
        $recipes = ModelsRecipe::findOrFail($id);
        $categories = Categories::all();

        return view('pages.editRecipe', compact('recipes', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse {

        $this -> validate($request, [
            'categoryId',
            'name',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'description',
            'ingredients',
            'instructions',
            'nutritions',
        ]);

        $recipes = ModelsRecipe::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/recipe', $image->hashName());

            Storage::delete('public/recipe/'.$recipes->image);

            $recipes->update([
                'categoryId' => $request -> categoryId,
                'name' => $request -> name,
                'image' => $image->hashName(),
                'description' => $request -> description,
                'ingredients' => $request -> ingredients,
                'instructions' => $request -> instructions,
                'nutritions' => $request -> nutritions,
            ]);
        } else {
            $recipes->update([
                'categoryId' => $request -> categoryId,
                'name' => $request -> name,
                'description' => $request -> description,
                'ingredients' => $request -> ingredients,
                'instructions' => $request -> instructions,
                'nutritions' => $request -> nutritions,
            ]);
        }


        return redirect()->route('admin.index')->with('success', 'Resep Berhasil Diubah');
    }

    public function destroy($id): RedirectResponse {
        $recipes = ModelsRecipe::findOrFail($id);
        Storage::delete('public/category/'.$recipes->image);
        $recipes->delete();
        return redirect()->route('admin.index')->with('success', 'Data Berhasil Dihapus');
    }
}
