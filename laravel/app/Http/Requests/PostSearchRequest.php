<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PostSearchRequest
 * @package App\Http\Requests
 * @property int $id
 * @property int $author
 * @property string $title
 * @property string $created_at
 */
class PostSearchRequest extends FormRequest
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
            'id'=>'integer',
            'author'=>'string',
            'title'=>'string',
            'created_at_to'=>'date',
            'created_at_from'=>'date'
        ];
    }
}
