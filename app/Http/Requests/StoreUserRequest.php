<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreUserRequest extends FormRequest
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
            'fname' => 'required|max:30',
            'lname' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6',
            'contact' => 'max:15',
            'nfc' => 'max:10',
            'secret' => 'max:10',            
        ];
    }
}
