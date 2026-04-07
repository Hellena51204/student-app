<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    // Bước quan trọng: Đổi false thành true để cho phép Form được gửi đi
    public function authorize(): bool
    {
        return true;
    }

    // Thiết lập các quy tắc kiểm tra dữ liệu
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // Bắt buộc nhập tên 
            'price' => 'required|numeric|gt:0', // Bắt buộc nhập số và giá phải > 0 
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Bắt buộc là file ảnh (upload ảnh) 
            'status' => 'required|in:draft,published'
        ];
    }

    // Tùy chọn: Viết lại câu thông báo lỗi cho thân thiện bằng tiếng Việt
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên khóa học.',
            'price.required' => 'Vui lòng nhập giá khóa học.',
            'price.gt' => 'Giá khóa học phải lớn hơn 0.',
            'image.image' => 'File tải lên phải là hình ảnh.'
        ];
    }
}
