<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        // dd($categorie);
        return view('pages.categorie.list', compact('categories'));
    }

    public function create() {
        return view('pages.categorie.add');
    }

    public function store(Request $request) {
        $categorie = new Categorie();
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->save();
        return redirect()->route('list.categorie');
    }

    public function edit(string $id) {
        $categorie = Categorie::find($id);
        // dd($categorie);
        return view('pages.categorie.edit', compact('categorie'));
    }

    public function update(Request $request, $id) {
        $categorie = Categorie::find($id);
        $categorie->name = $request->input('name');
        $categorie->description = $request->input('description');
        $categorie->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $categorie->save();
        return redirect()->route('list.categorie');
    }

    public function delete($id) {
        $categorie = Categorie::find($id);
        return view('pages.categorie.delete', compact('categorie'));
    }

    public function destroy($id) {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('list.categorie');
    }
}