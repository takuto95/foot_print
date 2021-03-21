<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditIdeal extends FormRequest
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
            'limit' => 'required',
            'content1' => 'required',
            'content2' => 'required',
            'content3' => 'required',
        ];
    }

    public function attributes(){
        return[
            'title' => 'タイトル',
            'limit' => '期限日',
            'content1' => '方針①',
            'content2' => '方針②',
            'content3' => '方針③',
        ];
    }
}
