<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionsRequest extends FormRequest
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
            'content' => 'required|string|max:500',
            'points' => 'required|integer|min:1',
            'answers' => 'required|array|min:3',
            'answers.*.content' => 'required|string|max:255',
            'correct_answer' => 'required|integer|min:0|max:2',
        ];
    }
}
