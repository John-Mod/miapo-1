<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codename' => ['string', 'min:5', "max:100"],
            'name' => ['string', 'min:5', "max:200"],
            'director' => ['required', 'integer'],
            'deadline' => ['regex:/(20[0-9]{2}$)|(20[0-9][0-9]-20[0-9]{2}$)/']
        ];
    }
}
