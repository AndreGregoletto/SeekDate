<?php

namespace App\Http\Requests\Admin\User;

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
            'name'                  => 'sometimes',
            'email'                 => 'sometimes|email',
            'password'              => 'sometimes',
            'nick_name'             => 'sometimes',
            'cell'                  => 'sometimes',
            'year'                  => 'sometimes',
            'photo'                 => 'null|sometimes|image',
            'description'           => 'sometimes',
            'job'                   => 'sometimes',
            'livin_in'              => 'sometimes',
            'gender_id'             => 'sometimes',
            'sexual_orientation_id' => 'sometimes',
            'smoking_id'            => 'sometimes',
            'admin'                 => 'sometimes',
            //filtro
            'sexual_orientation'    => 'sometimes',
            'gender'                => 'sometimes',
            'smokings'              => 'sometimes',
            'year_min'              => 'sometimes',
            'year_max'              => 'sometimes'
        ];
    }
}
