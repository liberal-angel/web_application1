<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoClientRequest extends FormRequest
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
            'task' => 'required|max:20'
        ];
    }
    public function messages()
    {
        return[
            'task.required' => ' ※この項目は入力必須です ',
            'task.max' => ' ※この項目は２０文字以内です '
        ];
    }
}
