<?php

namespace Tests\Static_methods;

use PHPUnit\Framework\TestCase;
use Src\Mailer;
use Src\UserStatic;

final class UserTestStatic extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $user = new UserStatic('dave@example.com');

        $mailer = $this->createMock(Mailer::class);

        $user->setMailer($mailer);

        $this->assertTrue($user->notify('Hello!'));
    }
}
