<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::all()
            ->where('featured', true)
            ->sortByDesc('product_id')
            ->take(8);

        $new_products = Product::all()
            ->sortByDesc('product_id')
            ->take(8);

        $data = [
            'featured_products' => $featured_products,
            'new_products' => $new_products,
        ];

        return view('frontend.index', $data);
    }

    public function details($id, $slug)
    {
        $product = Product::all()
            ->where('product_id', $id)
            ->where('slug', $slug)
            ->first();

        if (!$product) {
            return redirect('404');
        }

        $data = ['product' => $product];

        return view('frontend.details', $data);
    }

    public function category($id, $slug)
    {
        $products = Product::where('category_id', $id)->orderBy('product_id', 'desc')->paginate();
        $category_name = Category::findOrFail($id)->name;

        $data = [
            'products' => $products,
            'category_name' => $category_name,
        ];

        return view('frontend.category', $data);
    }
}
