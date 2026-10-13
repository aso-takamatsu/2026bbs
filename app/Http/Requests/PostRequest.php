<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title' => 'required|max:20',
        'body'  => 'required|min:10|max:500',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'タイトルを入力してください。',
            'title.max'      => 'タイトルは20文字以内で入力してください。',
            'body.required'  => '本文を入力してください。',
            'body.min'       => '本文は10文字以上で入力してください。',
            'body.max'       => '本文は500文字以内で入力してください。',
        ];
    }
}
