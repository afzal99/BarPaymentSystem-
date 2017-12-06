<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|max:255|unique:items,name',
            'description' => 'required|max:2000',
            'purchase_price' => 'required|max:10',
            'retail_price' => 'required|max:20',
            'group_id' => 'required',
        ];
    }
}
