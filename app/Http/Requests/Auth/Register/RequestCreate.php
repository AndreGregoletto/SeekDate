<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required',
            'nick_name'             => 'required',
            'cell'                  => 'required',
            'year'                  => 'required',
            'photo'                 => 'required',
            'description'           => 'required',
            'job'                   => 'required',
            'livin_in'              => 'required',
            'gender_id'             => 'required',
            'sexual_orientation_id' => 'required',
            'smoking_id'            => 'required',
            //filtro
            'sexual_orientation'    => 'required',
            'gender'                => 'required',
            'smokings'              => 'required',
            'year_min'              => 'required',
            'year_max'              => 'required'
        ];
    }
}
