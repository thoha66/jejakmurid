<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTeacherProfileUpdateRequest extends Request
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
            'nama_guru'         => 'required|alpha',
            'no_tel_guru'       => 'required|min:10|numeric',
            'no_hp_guru'        => 'required|min:10|numeric',
            'tarikh_lahir_guru' => 'required|date',
            'alamat_guru'       => 'required',
            'poskod_guru'       => 'required|min:5|numeric',
            'email_guru'        => 'required|email',
            'umur_guru'         => 'required|numeric',
            'jantina_guru'      => 'required'
        ];
    }
}
