<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'subject' => [ 'string', 'max:100'],
            'shabak' => ['string', 'max:100' , 'unique:books'] ,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام کتاب الزامیست',
            'shabak.unique:books'  => 'شماره شابک باید منحصر به فرد باشد',
            'author.required'  => 'نوشتن نام نویسنده کتاب الزامیست',
        ];
    }


}
