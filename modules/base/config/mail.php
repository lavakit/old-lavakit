<?php

return [
    'from' => env('MAIL_FROM_ADDRESS', 'info@gmail.com'),
    'name' => env('MAIL_FROM_NAME', 'Info'),

    /** Email template */
    'template' => 'backend::layouts.emails.auth',
];
