<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::all()->sortByDesc('product_id');

        $data = ['products' => $products];

        return view('backend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();

        $data = ['categories' => $categories];

        return view('backend.product.add_edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     */
    public function store(ProductRequest $request)
    {
        $file = $request->image;
        $file_name_uniqid = $this->getFileNameUniqueID($file);

        $new_product = new Product();

        $new_product->category_id = $request->category_id;

        $new_product->name = $request->name;
        $new_product->slug = Str::slug($request->name);
        $new_product->price = $request->price;
        $new_product->image = $file_name_uniqid;
        $new_product->warranty = $request->warranty;
        $new_product->accessories = $request->accessories;
        $new_product->condition = $request->condition;
        $new_product->promotion = $request->promotion;
        $new_product->status = $request->status;
        $new_product->description = $request->description;
        $new_product->featured = $request->featured;

        $new_product->save();

        //Nếu muốn lưu file vào thư mục storage/app :
        //$file->storeAs('upload_folder', $file_name);

        //Nếu muốn lưu file vào thư mục public thì dùng cách này:
        $file->move('asset\backend\img\product_image', $file_name_uniqid);

        return redirect()->route('product')->with('notification', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        //
    }


    /***
     * Show the form for editing the specified resource.
     *
     * @param $id
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $data = [
            'product' => $product,
            'categories' => $categories,
        ];

        return view('backend.product.add_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     */
    public function update(ProductRequest $request, $id)
    {
        $version_web = $request->version;
        $data_db = Product::findOrFail($id);
        $version_db = $data_db->version;

        if ($version_web != $version_db) {
            return redirect()->back()
                ->withInput()
                ->withErrors('Đã có sự thay đổi dữ liệu, hãy tải lại trang trước khi sửa');
        }

        $values = [
            'category_id' => $request->category_id,

            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'warranty' => $request->warranty,
            'accessories' => $request->accessories,
            'condition' => $request->condition,
            'promotion' => $request->promotion,
            'status' => $request->status,
            'description' => $request->description,
            'featured' => $request->featured,
            'version' => ++$version_web,
        ];

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file_name_uniqid = $this->getFileNameUniqueID($file);
            $values['image'] = $file_name_uniqid;
            $file->move('asset\backend\img\product_image', $file_name_uniqid);
            unlink('asset/backend/img/product_image/' . $request->image_old);
        }

        Product::where('product_id', $id)->update($values);

        return redirect()->route('product')->with('notification', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $product = Product::where('product_id', $id);

        $fileName = $product->first()->image;
        $str = 'asset/backend/img/product_image/';
        File::move(public_path($str . $fileName), public_path($str . 'trash/' . $fileName));

        $product->update(['deleted' => true]);

        return redirect()->route('product')->with('notification', 'Xóa sản phẩm thành công');
    }

    //Common method
    private function getFileNameUniqueID($file)
    {
        $file_name_original = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file_name_without_extension = Str::replaceLast('.' . $extension, '', $file_name_original);

        $str_time_now = Carbon::now()->format('ymd_his');
        $file_name = Str::slug($file_name_without_extension) . '_' . uniqid() . '_' . $str_time_now . '.' . $extension;

        return $file_name;
    }
}
