<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class ScoreRequest extends FormRequest
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
            'game_id' => ['required', 'integer'],
            'new_score' => ['required', 'integer', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'new_score.max' => 'O campos score deve ser menor que 100.',
        ];
    }
}
