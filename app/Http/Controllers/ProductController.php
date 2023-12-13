<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::
        select('products.id','products.name as product_name','products.description','products.price','categories.name as categorie')
        ->join('categories','products.categorie','=','categories.id')->get();
        // dd($products);
        return view('pages.product.list', compact('products'));
    }

    public function create() {
        $categories = Categorie::all();
        return view('pages.product.add', compact('categories'));
    }

    public function store(Request $request) {
        $product = new Product();
        $product->name = $request->input('name');
        $price = floatval($request['price']);
        $product->price = $price;
        $product->categorie = $request['categorie'];
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('list.product');
    }

    public function edit(string $id) {
        $categories = Categorie::all();
        $product = Product::find($id);
        $productCategorie = Categorie::select('categories.name','categories.id')->where('categories.id','=',$product->categorie)->first();
        // dd($productCategorie);
        return view('pages.product.edit', compact('categories','product','productCategorie'));
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $price = floatval($request['price']);
        $product->price = $price;
        $product->categorie = $request->input('categorie');
        $product->description = $request->input('description');
        $product->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $product->save();
        return redirect()->route('list.product');
    }

    public function delete($id) {
        $product = Product::select('products.id','products.name as product_name','products.description','products.price','categories.name as categorie')
        ->where('products.id','=',$id)->join('categories','products.categorie','=','categories.id')->first();
        return view('pages.product.delete', compact('product'));
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('list.product');
    }
}