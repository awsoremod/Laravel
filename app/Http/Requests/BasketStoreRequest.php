<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BasketStoreRequest extends FormRequest
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
            'idUser' => [
                'required',
                'numeric',
                Rule::exists('users', 'id'),
            ],
            'idProduct' => [
                'required',
                'numeric',
                Rule::exists('products', 'id')
            ]
        ];
    }
}
