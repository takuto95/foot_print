<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFuture extends FormRequest
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
            'title' => 'required',
            'detail' => 'required',
            'due_date' => 'required',
        ];
    }

    public function attributes(){
        return[
            'title' => 'タイトル',
            'detail' => '詳細',
            'due_date' => '期限日',
        ];
    }
}
