<?php

namespace Src;

final class UserStatic
{
    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    public function __construct(string $email){
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send the user a message
     * @param string $message The message
     * @return bool
     */
    public function notify(string $message)
    {
        return $this->mailer::send($this->email, $message);
    }
}
