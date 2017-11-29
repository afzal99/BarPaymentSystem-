<?php

namespace App\Http\Requests;


class StoreItemRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
            'purchase_price' => 'required|max:10',
            'retail_price' => 'required|max:20'
        ];
    }
}
