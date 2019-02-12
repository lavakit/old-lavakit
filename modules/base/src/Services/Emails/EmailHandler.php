<?php

namespace Inspire\Base\Services\Emails;

use Inspire\Base\Events\SendMailEvent;
use Exception;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler;

/**
 * Class EmailHandler
 * @package Inspire\Base\Services\Emails
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class EmailHandler
{
    /**
     * Set the view email
     *
     * @param string $view
     * @return $this
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function setTemplate(string $view)
    {
        config()->set('base.mail.template', $view);

        return $this;
    }

    /**
     * @param string $subject
     * @param string $body
     * @param array $args
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function send(string $subject, string $body, array $args = [])
    {
        try {
            event(new SendMailEvent($subject, $body, $args));
        } catch (Exception $ex) {
            info($ex->getMessage());
        }
    }

    public function sendErrorException(Exception $exception)
    {
        if (app()->environment() === 'local') {
            return;
        }

        try {
            $ex = FlattenException::create($exception);
            $handler = new ExceptionHandler();

            $body = $handler->getContent($ex);

            self::send(
                $exception->getFile(),
                $body,
                ['to' => config('base.mail.from'), 'name' => config('base.mail.name')]
            );

        } catch (Exception $ex) {
            info($ex->getMessage());
        }
    }
}
