<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStudentRequest extends Request
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
            'no_surat_beranak_pelajar' => 'required|min:7',
            'no_kp_pelajar' => 'required|min:12|numeric',
            'no_kp_penjaga_pelajar' => 'required|min:12|numeric'
        ];
    }
}
