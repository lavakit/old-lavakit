<?php

namespace Inspire\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package Inspire\User\Http\Requests
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class LoginRequest extends FormRequest
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
            'email'     => 'required|string|email|max:255',
            'password'  => [
                'required',
                'min:8',
                'regex:/^[a-zA-Z0-9-._]*$/u'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'  => trans('user::auth.validations.required', ['attribute' =>':attribute']),
            'string'    => trans('user::auth.validations.string', ['attribute' =>':attribute']),
            'max'       => trans('user::auth.validations.max.string', ['attribute' =>':attribute', 'max' => ':max']),
            'min'       => trans('user::auth.validations.min.string', ['attribute' =>':attribute', 'min' => ':min']),
            'email'     => trans('user::auth.validations.email', ['attribute' =>':attribute']),
            'regex'     => trans('user::auth.validations.password_regex')
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email'     => trans('user::auth.html.email'),
            'password'  => trans('user::auth.html.password'),
        ];
    }
}
