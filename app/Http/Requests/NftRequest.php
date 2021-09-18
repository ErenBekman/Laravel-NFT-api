<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NftRequest extends FormRequest
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
            'name' => 'required|unique:nfts,name|max:255|min:1',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg',
        ];
    }
}
