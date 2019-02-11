<?php

return [
    'html' => [
        'sign_in' => 'Đăng Nhập',
        'first_name' => 'Họ',
        'last_name' => 'Tên',
        'email' => 'Hộp thư',
        'password' => 'Mật khẩu',
        'password_confirm' => 'Xác nhận mật khẩu',
        'see_you_again' => 'Rất vui được gặp lại bạn',
        'remember' => 'Ghi nhớ',
        'forgot_password' => 'Quên mật khẩu ?',
        'not_account' => 'Chưa có tài khoản?',
        'create_account' => 'Tạo tài khoản',
        'register' => 'Đăng kí',
        'join_step' => 'Tham gia với chúng tôi ngay hôm nay! Chỉ mất vài bước',
        'accept' => 'Chấp nhận',
        'term_condition' => 'Các điều khoản và điều kiện',
        'has_account' => 'Bạn đã có tài khoản ?',
    ],

    'messages' => [

    ],

    'validations' => [
        'required' => 'Vui lòng nhập :attribute',
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
