<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'   => 'required|max:30',            
            'comment' => 'required|max:200', 
        ];
    }
    public function messages(): array                   
    {
        return [
            'title.required'   => '書名を入力してください。',
            'title.max'        => '書名は30文字以内で入力してください。',
            'comment.required' => 'ひとことを入力してください。',
            'comment.max'      => 'ひとことは200文字以内で入力してください。',
        ];
    }          
}
