<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateNewsRequest extends Request
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
            'tajuk' => 'required',
            'tarikh_mula' => 'required|date|after:yesterday',
            'tarikh_akhir' => 'required|date|after:tarikh_mula',
            'masa_mula' => 'required',
            'masa_akhir' => 'required',
            'tempat' => 'required',
            'penerangan_aktiviti' => 'required',
        ];
    }
}
