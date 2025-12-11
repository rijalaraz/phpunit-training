<?php

namespace Src;

use Src\AbstractPerson;

class Doctor extends AbstractPerson
{
    protected function getTitle()
    {
        return 'Dr.';
    }
}