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
            'nama_pelajar'          => 'required',
            'tarikh_lahir_pelajar'  => 'required|date',
            'alamat_pelajar'        => 'required',
            'poskod_pelajar'        => 'required|min:5|numeric',
            'email_pelajar'         => 'required|email',
            'umur_pelajar'          => 'required|numeric',
            'jantina_pelajar'       => 'required'
        ];
    }
}
