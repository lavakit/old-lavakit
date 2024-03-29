<?php

namespace Lavakit\User\Http\Requests;

use Lavakit\Base\Http\Requests\BaseFormRequest;

/**
 * Class ForgotRequest
 * @package Lavakit\User\Http\Requests
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class ForgotRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email'
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
            'email'     => trans('user::auth.validations.email', ['attribute' =>':attribute']),
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
        ];
    }
}
