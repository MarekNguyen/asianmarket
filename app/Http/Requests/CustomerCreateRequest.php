<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            //
            'name'=>'unique:customers|string|max:50'
        ];
    }
    public function messages()
    {
        return [
           'name.unique'=>'Tên khách hàng này đã tồn tại!!! Xin mời nhập tên khác!!!',
           'name.max'=>'Tên khách hàng không được vượt quá 50 kí tự!!! Xin mời nhập tên khác!!!'
        ];
    }
}
