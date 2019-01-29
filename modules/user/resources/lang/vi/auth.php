<?php

return [
    'html' => [
        'email' => 'E-mail',
        'password' => 'Password'
    ],

    'messages' => [

    ],

    'validations' => [
        'required' => '[vi]Please enter your :attribute',
        'string' => '[vi]The :attribute must be a string',
        'max' => [
            'numeric' => '[vi]The :attribute may not be greater than :max',
            'file'    => '[vi]The :attribute may not be greater than :max kilobytes',
            'string'  => '[vi]The :attribute may not be greater than :max characters',
            'array'   => '[vi]The :attribute may not have more than :max items',
        ],
        'min' => [
            'numeric' => '[vi]The :attribute must be at least :min',
            'file'    => '[vi]The :attribute must be at least :min kilobytes',
            'string'  => '[vi]The :attribute must be at least :min characters',
            'array'   => '[vi]The :attribute must have at least :min items',
        ],
        'email' => '[vi]The :attribute is invalid',
        'unique' => '[vi]The :attribute you have entered is already registered',
        'confirmed' => '[vi]The :attribute confirmation does not match',
        'password_regex' => '[vi]The Password may have alpha-numeric characters, as well as symbols (only . - _)',
    ],
];
