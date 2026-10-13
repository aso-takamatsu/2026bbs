<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'   => 'required|max:30',
            'content' => 'required|min:20|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'   => 'タイトルを入力してください。',
            'title.max'        => 'タイトルは30文字以内で入力してください。',
            'content.required' => '内容を入力してください。',
            'content.min'      => '内容は20文字以上で入力してください。',
            'content.max'      => '内容は1000文字以内で入力してください。',
        ];
    }
}