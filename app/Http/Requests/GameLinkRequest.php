<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameLinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|in:geo,word,movies,other,video-game',
            'subCategory' => 'required|array',
            'link' => 'required|string',
        ];
    }
}
