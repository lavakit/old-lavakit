<?php

namespace Lavakit\User\Http\Requests;

use Lavakit\Base\Http\Requests\BaseFormRequest;

/**
 * Class ChangePasswordRequest
 * @package Lavakit\User\Http\Requests
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ChangePasswordRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'required',
                'min:8',
                'max:254',
                'regex:/^[a-zA-Z0-9-._]*$/u'
            ],
            'new_password' => [
                'required',
                'min:8',
                'max:254',
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
            'max'       => trans('user::auth.validations.max.string', ['attribute' =>':attribute', 'max' => ':max']),
            'min'       => trans('user::auth.validations.min.string', ['attribute' =>':attribute', 'min' => ':min']),
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
            'password' => trans('user::auth.html.password'),
            'new_password' => trans('user::auth.html.new_password'),
        ];
    }
}
