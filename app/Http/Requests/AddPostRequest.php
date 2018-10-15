<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
        return [
            'title'=>'required|min:3|max:200',
    		'description' =>'required|max:200',
    		'category'=> 'required',
    		'content'=> 'required',
    		'feature'=> 'required',
        ];
    }

    public function messages() {
        return [
            'title.required'=>'Không được bỏ trống tiêu đề.',
    		'title.unique' => 'Tin này đã bị trùng, vui lòng nhập lại!',
    		'title.min'=>'Tên tin tức gồm ít nhất 3 ký tự!',
    		'title.max'=>'Tên tin tức gồm tối đa 200 ký tự!',
    		'des.required'=>'Không được bỏ trống tóm tắt.',
    		'content.required'=>'Không được bỏ trống nội dung',
            'category_id.required'=> 'Không được bỏ trống chuyên mục.',
            'feature.required'=> 'Không được bỏ trống ảnh',
        ];
    }
}
