<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PenyuluhanGalleryRequest extends FormRequest
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
            'penyuluhan_id' => 'required|integer|exists:penyuluhan,id',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
