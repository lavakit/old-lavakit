<?php

namespace Lavakit\Base\Services\Emails;

use Illuminate\Support\Arr;
use Lavakit\Base\Events\SendMailEvent;
use Exception;
use View;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\Debug\ExceptionHandler;

/**
 * Class EmailHandler
 * @package Lavakit\Base\Services\Emails
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class EmailHandler
{
    /**
     * Set the view email
     *
     * @param string $view
     * @return $this
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function setTemplate(string $view)
    {
        if (View::exists($view)) {
            config()->set('base.mail.template', $view);
        }

        return $this;
    }
    
    /**
     * @param array $from
     * @return $this
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function setFrom(array $from = [])
    {
        if (!empty($address = Arr::get($from, 'address'))) {
            config()->set('base.mail.from.address', $address);
        }
        
        if (!empty($name = Arr::get($from, 'name'))) {
            config()->set('base.mail.from.name', $name);
        }
        
        return $this;
    }

    /**
     * @param string $subject
     * @param string $body
     * @param array $args
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function send(string $subject, string $body, array $args = [])
    {
        try {
            event(new SendMailEvent($subject, $body, $args));
        } catch (Exception $ex) {
            info($ex->getMessage());
        }
    }

    /**
     * @param Exception $exception
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
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
                ['to' => config('base.mail.from.address'), 'name' => config('base.mail.from.name')]
            );

        } catch (Exception $ex) {
            info($ex->getMessage());
        }
    }
}
