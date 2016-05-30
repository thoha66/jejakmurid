<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStudentUpdateRequest extends Request
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
            'no_kp_penjaga' => 'required|min:7',
            'nama_penjaga' => 'required|alpha',
            'alamat_penjaga' => 'required',
            'poskod_penjaga' => 'required|min:4|numeric',
            'no_tel_penjaga' => 'required|min:10|numeric'
        ];
    }
}
