<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateOffenceRequest extends Request
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
            'tarikh_kesalahan' => 'required|date',
            'masa_kesalahan' => 'required',
            'tempat_kesalahan' => 'required'
        ];
    }
}
