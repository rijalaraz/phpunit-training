<?php

namespace Tests\Queue;

use PHPUnit\Framework\TestCase;
use Src\Queue;
use Src\QueueException;

final class Queue006Test extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i=0; $i < Queue::MAX_ITEMS ; $i++) { 
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToFullQueue()
    {
        for ($i=0; $i < Queue::MAX_ITEMS ; $i++) { 
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->expectExceptionMessage("Queue is full");

        $this->queue->push('another item');        
    }
}
