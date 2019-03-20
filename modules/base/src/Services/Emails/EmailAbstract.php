<?php

namespace Lavakit\Base\Services\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class EmailAbstract
 * @package Lavakit\Base\Services\Emails
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class EmailAbstract extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string */
    protected $title;

    /** @var string */
    protected $body;

    /** @var array */
    protected $args;

    /**
     * EmailAbstract constructor
     *
     * @param string $title
     * @param string $body
     * @param array $args
     */
    public function __construct(string $title, string $body, array $args)
    {
        $this->title = $title;
        $this->body = $body;
        $this->args = $args;
    }

    /**
     * Build the message.
     *
     * @return $this
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com
     */
    public function build()
    {
        return $this->from(config('base.mail.from'), config('base.mail.name'))
            ->to($this->args['to'], $this->args['name'])
            ->subject($this->title)
            ->markdown(config('base.mail.template'))
            ->with(['body' => $this->body, 'args' => $this->args]);
    }
}
