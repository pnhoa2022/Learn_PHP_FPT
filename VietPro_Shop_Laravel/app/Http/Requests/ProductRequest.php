<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rule = [
            'image' => 'image',

            'categoty_id' => 'required',

            'name' => 'required',
            'price' => 'required',
            'warranty' => 'required',
            'accessories' => 'required',
            'condition' => 'required',
            'promotion' => 'required',
            'status' => 'required',
            'description' => 'required',
        ];

        if ($this->segment(3) == 'add') {
            $rule['image'] = 'image|required';
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'image.image' => '[Ảnh sản phẩm] phải là một hình ảnh',
            'image.required' => '[Ảnh sản phẩm] không được để trống',

            'categoty_id.required' => '[Danh mục] không được để trống',

            'name.required' => '[Tên] không được để trống',
            'price.required' => '[Giá bán] không được để trống',
            'warranty.required' => '[Bảo hành] không được để trống',
            'accessories.required' => '[Phụ kiện] không được để trống',
            'condition.required' => '[Tình trạng] không được để trống',
            'promotion.required' => '[Khuyến mãi] không được để trống',
            'status.required' => '[Trạng thái] không được để trống',
            'description.required' => '[Miêu tả] không được để trống',
        ];
    }
}
