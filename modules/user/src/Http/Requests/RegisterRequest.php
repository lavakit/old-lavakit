<?php

namespace Inspire\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest
 * @package Inspire\User\Http\Requests
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class RegisterRequest extends FormRequest
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
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => [
                'required',
                'email',
                'max:100',
                Rule::unique('users', 'email'),
            ],
            'password'      => [
                'required',
                'min:8',
                'confirmed',
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
            'unique'    => trans('user::auth.validations.unique', ['attribute' =>':attribute']),
            'confirmed' => trans('user::auth.validations.confirmed', ['attribute' =>':attribute']),
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
            'first_name'    => trans('user::auth.html.first_name'),
            'last_name'     => trans('user::auth.html.last_name'),
            'email'         => trans('user::auth.html.email'),
            'password'      => trans('user::auth.html.password')
        ];
    }
}
