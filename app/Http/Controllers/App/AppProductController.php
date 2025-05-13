<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AppProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->get();
        return view('app.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|string',
            'status' => 'required|string',
        ]);
        // return $request;

        $product = Product::create([
            'name' => $request->name,
            'code' => $request->code,
            'category' => $request->category,
            'unit' => $request->unit,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('app.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|string',
            'status' => 'required|string',
        ]);

        // $product = Product::update([
        //     'name' => $request->name,
        //     'code' => $request->code,
        //     'category' => $request->category,
        //     'unit' => $request->unit,
        //     'price' => $request->price,
        //     'status' => $request->status,
        // ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category = $request->category;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
