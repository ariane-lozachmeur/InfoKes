<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'auteur' => 'required|min:4',
            'cat_id' => 'required',
            'contenu' => 'required_if:fichier,null|min:200',
            'ficher' => 'required_if:contenu,null',
        ];
    }
}
