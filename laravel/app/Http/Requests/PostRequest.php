<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required',
            'desc'=>'required',
            'user_id'=>'required|integer|exists:users,id',
            'image'=>'image'
        ];
    }

    public function messages()
    {
        return [
            'user_id.exists'=>'Такого пользователя нет в базе',
            'image.image'=>'Картинка имеет не подходяший формат'
        ];
    }
}
