<?php

namespace Inspire\Base\Services\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class EmailAbstract
 * @package Inspire\Base\Services\Emails
 * @copyright 2019 Inspire Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class EmailAbstract extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    protected $title;

    /** @var string */
    protected $body;

    /**
     * EmailAbstract constructor
     *
     * @param string $title
     * @param string $body
     */
    public function __construct(string $title, string $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     * @copyright 2019 Inspire Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function build()
    {
        return $this->from(config('base.mail.from'))
            ->subject($this->subject)
            ->view(config('base.mail.template'))
            ->with(['body' => $this->body]);
    }
}
