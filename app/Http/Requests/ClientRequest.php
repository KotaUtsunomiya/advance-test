<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'family-name'   =>  'required',
            'given-name'    =>  'required',
            'gender'        =>  'required',
            'email'         =>  'required | email:filter,dns',
            'postcode'      =>  'required | regex:/^[0-9]{3}-[0-9]{4}$/',
            'address'       =>  'required',
            'opinion'       =>  'required | max:120',
        ];
    }

    public function messages()
    {
        return [
            'family-name.required'  =>  '姓を入力してください。',
            'given-name.required'   =>  '名前を入力してください。',
            'gender.required'       =>  '性別を選択してください。',
            'email.required'        =>  'メールアドレスを入力してください。',
            'postcode.required'     =>  '郵便番号を入力してください。',
            'address.required'      =>  '住所を入力してください。',
            'opinion.required'      =>  'ご意見を入力してください。',
            'email.email'           =>  'メールアドレスの形式で入力してください。',
            'postcode.regex'        =>  '郵便番号はハイフンありの半角数字8文字で入力してください。',
            'opinion.max'           =>  'ご意見は120文字以内で入力してください。',
        ];    }
}
