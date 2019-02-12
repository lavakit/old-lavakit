<?php

namespace Inspire\Base\Listeners;

use Illuminate\Contracts\Mail\Mailer;
use Inspire\Base\Services\Emails\EmailAbstract;
use Log;
use Inspire\Base\Events\SendMailEvent;

/**
 * Class SendMailListener
 * @package Inspire\Base\Listeners
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SendMailListener
{
    /** @var Mailer */
    protected $mailer;

    /**
     * SendMailListener constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer =  $mailer;
    }

    /**
     * @param SendMailEvent $event
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function handle(SendMailEvent $event)
    {
        try {
            $this->mailer->to($event->args['to'], $event->args['name'])
                ->send(new EmailAbstract($event->subject, $event->body));

            info('Send mail to' . $event->args['to'] . 'successfully');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
