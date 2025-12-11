<?php

namespace Tests\Static_methods;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Src\Mailer;

final class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $mailer = new Mailer();

        $this->assertTrue($mailer->send('dave@example.com', 'Hello!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        $mailer = new Mailer();

        $mailer->send('', '');
    }
}
