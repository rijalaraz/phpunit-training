<?php

namespace Tests\Static_methods;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Src\Mailer;

final class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send('', '');
    }
}
