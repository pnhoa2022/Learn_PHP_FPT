<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $data = ['categories' => Category::all()];
        return view('backend.category', $data);
    }

    public function postAddCategory(CategoryRequest $request)
    {
        $name = $request->name;

        $new_category = new Category();

        $new_category->name = $name;
        $new_category->slug = Str::slug($name);
        $new_category->created_by = Auth::user()->name;

        $new_category->save();

        return redirect()->back()->withInput()->with('notification', 'Thêm danh mục thành công');
    }

    public function getEditCategory($id)
    {
        $data = ['category' => Category::findOrFail($id)];
        return view('backend.editcategory', $data);
    }

    public function postEditCategory($id, CategoryRequest $request)
    {
        $new_name = $request->name;
        $id = $request->category_id;

        $version_web = $request->version;
        $data_db = Category::findOrFail($id);
        $version_db = $data_db->version;
        $old_name = $data_db->name;

        if ($new_name == $old_name) {
            return redirect()->back()
                ->withInput()
                ->with('notification', 'Bạn không thay đổi gì, thao tác được hoàn tác');
        }

        if ($version_web != $version_db) {
            return redirect()->back()
                ->withInput()
                ->withErrors('Đã có sự thay đổi dữ liệu, hãy tải lại trang trước khi sửa');
        }

        Category::where('category_id', $id)->update([
            'name' => $new_name,
            'slug' => Str::slug($new_name),
            'version' => ++$version_web,
            'updated_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('notification', 'Sửa danh mục thành công');
    }

    public function getDeleteCategory($id)
    {
        Category::where('category_id', $id)->update([
            'deleted' => true,
            'updated_by' => Auth::user()->name,
        ]);

        //Category::where('category_id', $id)->delete();

        return redirect()->back()->with('notification', 'Xóa danh mục thành công');
    }
}
