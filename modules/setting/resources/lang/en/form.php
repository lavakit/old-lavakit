<?php

return [
    'emails' => [
        'smtp' => [
            'from_email' => 'From email address',
            'from_name' => 'From name',
            'force_from_name' => 'Force From Name Replacement',
            'replay_to_email' => 'Reply-To email address',
            'host' => 'SMTP host',
            'type_encryption' => 'Type of encryption',
            'port' => 'SMTP port',
            'autentication' => 'SMTP autentication',
            'username' => 'SMTP username',
            'password' => 'SMTP password',
            'descriptions' => [
                'from_email' => 'This email address will be used in the From field.',
                'from_name' => 'This text will be used in the FROM field',
                'force_from_name' => 'When enabled, the plugin will set the above From Name for each email. Disable it if you\'re using contact form plugins, it will prevent the plugin from replacing form submitter\'s name when contact email is sent. \\n If email\'s From Name is empty, the plugin will set the above value regardless.',
                'replay_to_email' => 'Optional. This email address will be used in the \'Reply-To\' field of the email. Leave it blank to use From email as the reply-to value.',
                'host' => 'Your mail server',
                'type_encryption' => 'For most servers SSL/TLS is the recommended option',
                'port' => 'The port to your mail server',
                'autentication' => 'This options should always be checked \'Yes\'',
                'username' => 'The username to login to your mail server',
                'password' => 'he password to login to your mail server',
            ],
        ],
        'test' => [
            'to' => 'To',
            'subject' => 'Subject',
            'Message' => 'Message',
            'descriptions' => [
                'to' => 'Enter the recipient\'s email address',
                'subject' => 'Enter a subject for your message',
                'message' => 'Write your email message',
            ],
        ],
    ],
];
