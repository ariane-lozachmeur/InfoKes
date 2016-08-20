<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActusKesRequest extends Request
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
            'contenu' => 'required|min:30',
            'published_at' => 'required|date|before:published_until',
            'published_until' => 'required|date|after:published_at',
        ];
    }
}
