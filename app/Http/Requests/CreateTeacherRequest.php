<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTeacherRequest extends Request
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
            //'classroom_subject_id' => 'required|min:12|numeric',
            'email_guru' => 'required|email'
//            'jenis_guru' => 'required'
//            'guru_kelas_id' => 'required'
        ];
    }
}
