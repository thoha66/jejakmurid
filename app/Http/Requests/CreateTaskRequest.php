<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTaskRequest extends Request
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
            'classroom_subject_id'  => 'required',
            'tajuk_tugasan'         => 'required',
            'penerangan_tugasan'    => 'required',
            'tarikh_beri'           => 'required|after:yesterday',
            'tarikh_hantar'         => 'required|after:yesterday'
        ];
    }
}
