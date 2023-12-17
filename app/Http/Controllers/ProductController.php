<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('products')->insert($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function show($id)
    {
        $product = DB::table('products')->find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('products')->where('id', $id)->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product Updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.index');
    }

    // Add other CRUD methods as needed
}
