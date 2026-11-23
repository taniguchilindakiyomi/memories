<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoryRequest extends FormRequest
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
            'date' => 'required|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '正しい日付を入力してください',
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは255文字以内で入力してください',
            'content.required' => '本文を入力してください',
            'image.image' => '画像ファイルを選択してください',
            'image.max' => '画像のサイズは10MB以内にしてください',
        ];
    }
}
