<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Category extends Controller
{
    public function index(): View {
        $categories = Categories::all();

        return view('pages.categories', compact('categories'));
    }

    public function store(Request $request): RedirectResponse {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/category', $image->hashName());

        Categories::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('kategori.store')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    public function destroy($id): RedirectResponse {
        $categories = Categories::findOrFail($id);
        Storage::delete('public/category/'.$categories->image);
        $categories->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Dihapus');
    }
}
