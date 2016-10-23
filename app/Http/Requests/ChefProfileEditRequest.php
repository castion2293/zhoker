<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefProfileEditRequest extends FormRequest
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
            'address' => 'required|max:255',
            'city' => 'required|max:30',
            'state' => 'required|max:30',
            'zip_code' => 'required|max:10',
            'store_name' => 'required|max:255',
            'profile_img' => 'required|image',
            'store_description' => 'required',
            
        ];
    }
}
