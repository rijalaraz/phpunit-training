<?php

namespace Tests\Non_public_methods;

use Mockery;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Src\AbstractPerson;
use Src\Doctor;

final class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {
        $doctor = new Doctor('Green');

        $this->assertEquals('Dr. Green', $doctor->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $person = Mockery::mock(AbstractPerson::class, ['Green']);

        $person
            ->makePartial()                         // run real constructor + keep real methods
            ->shouldAllowMockingProtectedMethods()  // allow mocking protected abstract method
        ;

        $person->shouldReceive('getTitle')->andReturn('Dr.');

        $this->assertSame('Dr. Green', $person->getNameAndTitle());
    }
}
