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
     * Get the user's full name from their first name and surname
     */
    public function getFullName(): string
    {
        return trim($this->first_name . ' ' . $this->surname);
    }
}
