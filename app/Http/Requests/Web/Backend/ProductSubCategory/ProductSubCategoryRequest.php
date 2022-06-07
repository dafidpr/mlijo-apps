<?php

namespace App\Http\Requests\Web\Backend\ProductSubCategory;

use Illuminate\Foundation\Http\FormRequest;

class ProductSubCategoryRequest extends FormRequest
{
    private $routeName;

    public function __construct()
    {
        $this->routeName = request()->route()->getName();
    }
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
            'category' => 'required',
            'name' => 'required|string|max:255',
            'image' => [
                $this->routeName == 'admin.product-sub-categories.update' ? 'nullable' : 'required',
                'mimes:png,jpg,jpeg'
            ],
        ];
    }
}
