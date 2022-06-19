<?php

namespace App\Http\Requests\Web\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'product_category' => 'required',
            'product_subcategory' => 'required',
            'name' => 'required',
            'keyword' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'price' => 'required',
            'min_order' => 'required|numeric',
            'stock' => 'required|numeric',
            'expired' => 'required|numeric',
            'weight' => 'required|numeric',
        ];
    }
}
