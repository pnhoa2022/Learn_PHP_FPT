<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(4);
        if (isset($id)) {
            $except = ',' . $id . ',category_id,deleted,0'; //kiểm tra trùng lặp, loại bỏ ID hiện tại & deleted = 0 (Không bao gồm những bản ghi đã bị xóa)
        } else {
            $except = ',1,deleted'; //deleted <> 1 : Không bao gồm những bản ghi đã bị xóa
        }

        return [
            'name' => 'required|min:2|max:64|unique:category,name' . $except,
        ];
    }

    /***
     * Change the autogenerated stub
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.required' => 'Tên danh mục không được trống',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá dài',
        ];
    }
}
