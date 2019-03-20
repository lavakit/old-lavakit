<?php

namespace Lavakit\User\Services\Authentication\Users;

/**
 * Class Logout
 * @package Lavakit\User\Services\Authentication\Users
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Logout
{
    /**
     * Log the user out of the application
     *
     * @param array $messages
     * @return \Illuminate\Http\RedirectResponse
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(array $messages = [])
    {
        auth()->logout();

        if (!empty(array_get($messages, 'confirm'))) {
            return redirect()->route('login')->with('alert-info', trans($messages['confirm']));
        }

        return redirect()->route('login');
    }
}
