<?php

namespace Inspire\User\Services\Authentication\Users;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * Class Forgot
 * @package Inspire\User\Services\Authentication\Users
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class Forgot
{
    use SendsPasswordResetEmails;

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handler(Request $request)
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Get the response for a successful password reset link.
     *
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     *
     * Override
     * @see SendsPasswordResetEmails::sendResetLinkResponse();
     *
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('alert-success', trans('user::auth.messages.' . $response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     *
     * Override
     * @see SendsPasswordResetEmails::sendResetLinkFailedResponse();
     *
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans('user::auth.messages.' . $response)]);
    }

}
