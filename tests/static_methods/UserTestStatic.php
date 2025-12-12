<?php

namespace Tests\Static_methods;

use Mockery;
use PHPUnit\Framework\TestCase;
use Src\Mailer;
use Src\UserStatic;

final class UserTestStatic extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new UserStatic('dave@example.com');

        $mailer = $this->createMock(Mailer::class);

        $mailer->expects($this->once())
                ->method('send')
                ->willReturn(true);

        $user->setMailer($mailer);

        $this->assertTrue($user->notify('Hello!'));
    }

    public function testNotifyReturnsTrueWithCallable()
    {
        $user = new UserStatic('dave@example.com');

        $user->setMailerCallable([Mailer::class, 'send']);

        $this->assertTrue($user->notifyCallable('Hello!'));
    }

    public function testNotifyReturnsTrueWithMockery()
    {
        $user = new UserStatic('dave@example.com');

        $mock = Mockery::mock('alias:Mailer');

        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->notify('Hello!'));
    }
}
