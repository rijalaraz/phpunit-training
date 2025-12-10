<?php

namespace Tests\Test_doubles;

use PHPUnit\Framework\TestCase;
use Src\Mailer;

final class Mailer001Test extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock
            ->method('sendMessage')
            ->willReturn(true)
        ;

        $result = $mock->sendMessage('dave@example.com', 'Hello');

        $this->assertTrue($result);
    }
}
