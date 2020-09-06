<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PeternakRequest extends FormRequest
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
            //'user_id' => 'required|integer|exists:user,id', 
            'slug' => 'max:50',
            'deskripsi' => 'required|max:50',
            'nama' => 'required|max:255', 
            'alamat' => 'required|max:255', 
            'no_telp' => 'required|max:12', 
            'jumlah_ternak'=> 'required|integer', 
            'jenis_ternak'=> 'required|max:255',
            'status_verifikasi' => 'required|max:255',
        ];
    }
}
