<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $supplier = Supplier::all();
        // dd($supplier);
        return view('pages.supplier.list', compact('supplier'));
    }

    public function create() {
        return view('pages.supplier.add');
    }

    public function store(Request $request) {
        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->phone = $request->input('phone');
        $supplier->mail = $request->input('mail');
        $supplier->save();
        return redirect()->route('list.supplier');
    }

    public function edit(string $id) {
        $supplier = Supplier::find($id);
        // dd($supplier);
        return view('pages.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id) {
        $supplier = Supplier::find($id);
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->phone = $request->input('phone');
        $supplier->mail = $request->input('mail');
        $supplier->updated_at = Carbon::now()->setTimezone('America/Bogota');
        $supplier->save();
        return redirect()->route('list.supplier');
    }

    public function delete($id) {
        $supplier = Supplier::find($id);
        return view('pages.supplier.delete', compact('supplier'));
    }

    public function destroy($id) {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('list.supplier');
    }
}