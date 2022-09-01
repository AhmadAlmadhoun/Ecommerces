<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.Products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        $product = new Product();
        return view('admin.Products.create',compact(['product','categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'qty' => 'required',
            'parent_id' => 'nullable|exists:products,id',
        ]);

        // upload the file
        // $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('uploads/images'), $new_image);
        // Save data to database
        Product::create([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.products.index')->with('msg', 'Product Created')->with('type', 'success');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $products = Product::findOrFail($id);
        // $categories = Category::findOrFail($id);
        // return view('admin.products.edit',compact(['products','categories']));
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'qty' => 'required',
            'parent_id' => 'nullable|exists:products,id',
        ]);

        // upload the file
        // $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('uploads/images'), $new_image);
        // Save data to database
       $product->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.products.index')->with('msg', 'Product Created')->with('type', 'success');      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

    File::delete(public_path($product->image));

        $product->delete();

        return redirect()->route('admin.products.index')->with('msg', 'Product deleted successfully')->with('type', 'danger');

    }


}
