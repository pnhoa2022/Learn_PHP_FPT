<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $product->comments = $product->comments->sortByDesc('comment_id');

        if (!$product) {
            return redirect('404');
        }

        $data = ['product' => $product];

        return view('frontend.details', $data);
    }

    public function postComment($id, $slug, CommentRequest $request)
    {
        $comment = new Comment();

        $comment->product_id = $id;

        $comment->name = $request->comment_name;
        $comment->email = $request->comment_email;
        $comment->content = $request->comment_content;

        $comment->save();

        return redirect('details/' . $id . '/' . $slug . '.html#comment')->with('notification', 'Thêm bình luận thành công!');

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

    public function search(Request $request)
    {
        $q = $keyword_search = $request->get('q');
        $q = str_replace(' ', '%', $q);

        $products = Product::where('name', 'like', '%' . $q . '%')->orderBy('product_id', 'desc')->get();

        $data = [
            'products' => $products,
            'keyword_search' => $keyword_search,
        ];

        return view('frontend.search', $data);
    }
}
