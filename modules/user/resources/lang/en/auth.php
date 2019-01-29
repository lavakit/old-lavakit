<?php


return [
    'html' => [
        'email' => 'E-mail',
        'password' => 'Password'
    ],

    'messages' => [

    ],

    'validations' => [
        'required' => 'Please enter your :attribute',
        'string' => 'The :attribute must be a string',
        'max' => [
            'numeric' => 'The :attribute may not be greater than :max',
            'file'    => 'The :attribute may not be greater than :max kilobytes',
            'string'  => 'The :attribute may not be greater than :max characters',
            'array'   => 'The :attribute may not have more than :max items',
        ],
        'min' => [
            'numeric' => 'The :attribute must be at least :min',
            'file'    => 'The :attribute must be at least :min kilobytes',
            'string'  => 'The :attribute must be at least :min characters',
            'array'   => 'The :attribute must have at least :min items',
        ],
        'email' => 'The :attribute is invalid',
        'unique' => 'The :attribute you have entered is already registered',
        'confirmed' => 'The :attribute confirmation does not match',
        'password_regex' => 'The Password may have alpha-numeric characters, as well as symbols (only . - _)',
    ],
];
