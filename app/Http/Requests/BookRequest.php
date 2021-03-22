<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class BookRequest extends FormRequest
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
            'title'             => 'required|max:255',
            'isbn'              => 'required|max:255',
            'price'             => 'required|integer',
            // 'slug'              => 'required',
            'description'       => 'required',
            'weight'            => 'required|integer',
            'size'              => 'required|integer',
            'publication_date'  => 'required',
            'publication_ebook' => 'required',
            'recommendation'    => 'boolean',
            'recommendation'    => 'required',
            'author'            => 'required|integer',
            'publisher'         => 'required|integer',
            'available_qty'     => 'required|integer',
            'category_id'     => 'required|integer',
        ];
    }
}
