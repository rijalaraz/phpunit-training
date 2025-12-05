<?php

namespace Src;

final class User
{
    /**
     * First name
     * @var string
     */
    public string $first_name = '';

    /**
     * Last name
     * @var string
     */
    public string $surname = '';

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

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first name and surname
     */
    public function getFullName(): string
    {
        return trim($this->first_name . ' ' . $this->surname);
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}
