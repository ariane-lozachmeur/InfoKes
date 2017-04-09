<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IKRequest extends Request
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
            'titre' => 'required|min:5',
            'numero' => 'required|unique:ik',
            'pdf' => 'required',
            'une' => 'required|image',
            'published_at' => 'required|date'
        ];
    }
}
