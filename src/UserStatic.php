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

     /**
     * Mailer callable
     * @var callable
     */
    protected $mailer_callable;

    public function __construct(string $email){
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setMailerCallable(callable $mailer_callable)
    {
        $this->mailer_callable = $mailer_callable;
    }

    /**
     * Send the user a message
     * @param string $message The message
     * @return bool
     */
    public function notify(string $message)
    {
        return Mailer::send($this->email, $message);
    }

    /**
     * Send the user a message
     * @param string $message The message
     * @return bool
     */
    public function notifyCallable(string $message)
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }
}
