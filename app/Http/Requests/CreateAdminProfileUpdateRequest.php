<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAdminProfileUpdateRequest extends Request
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
            'no_kp_admin'           => 'required|min:12|numeric',
            'nama_admin'            => 'required|alpha',
            'no_tel_admin'          => 'required|min:10|numeric',
            'no_hp_admin'           => 'required|min:10|numeric',
            'tarikh_lahir_admin'    => 'required|date',
            'alamat_admin'          => 'required',
            'poskod_admin'          => 'required|min:5|numeric',
            'email_admin'           => 'required|email',
            'jantina_admin'         => 'required'

        ];
    }
}
