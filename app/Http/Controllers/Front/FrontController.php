<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $main_categories = Category::with('children')->whereNull('parent_id')->take(11)->get();
        $cild_categories = Category::with('children','products')->whereNull('parent_id')->take(3)->get();

        $latest_products = Product::with('category')->orderByDesc('created_at')->limit(3)->get();
        $products =Product::all();

        $categories = Category::with('children')->where('parent_id',Null)->take(11)->get();
        return view('site.index',compact('categories','main_categories','latest_products','cild_categories','products'));
    }
    public function category($id)
    {
        $categories = Category::findOrFail($id);
        return view('site.category',compact('categories'));
    }
    public function productdetails($id)
    {
        $products = Product::findOrFail($id);

        return view('site.product-details',compact('products'));
    }

}
