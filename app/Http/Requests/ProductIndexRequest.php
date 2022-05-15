<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
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
            'limit' => 'required|numeric', // количество продуктов на странице
            'page' => 'required|numeric', // номер страницы
            'sort' =>  [ // yes - сортировка по возрастанию цены
                'required',
                Rule::in(['yes', 'no']),
            ],
            'brands' => 'array', // массив брендов
            'stock' => [ // yes - в наличии
                'required',
                Rule::in(['yes', 'no']),
            ],
            'id' => 'required|numeric' // id типа
        ];
    }
}
