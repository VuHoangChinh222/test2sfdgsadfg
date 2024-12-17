<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            //
            'name' => 'required',
            // 'category_id' => 'required',
            // 'brand_id' => 'required',
            // 'price' => 'required|numeric',
            // 'qty' => 'required|integer',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // 'status' => 'required|in:1,2',
        ];
    }
    public function messages(): array
    {
        return [
            //
            'name.required' => 'Name must be entered!',
            // 'category_id.required' => 'Danh mục bắt buộc phải chọn!',
            // 'brand_id.required' => 'Thương hiệu bắt buộc phải chọn!',
            // 'price.required' => 'Giá bắt buộc phải nhập!',
            // 'price.numeric' => 'Giá phải là một số!',
            // 'qty.required' => 'Số lượng bắt buộc phải nhập!',
            // 'qty.integer' => 'Số lượng phải là một số nguyên!',
            // 'image.required' => 'Sản phẩm bắt buộc phải có ảnh!',
            // 'image.image' => 'File tải lên phải là ảnh!',
            // 'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, hoặc webp!',
            // 'image.max' => 'Ảnh có dung lượng tối đa là 2048 KB!',
            // 'status.required' => 'Trạng thái bắt buộc phải chọn!',
            // 'status.in' => 'Trạng thái không hợp lệ!',
        ];
    }
}
