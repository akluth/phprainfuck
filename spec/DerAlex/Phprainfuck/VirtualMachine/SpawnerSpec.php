<?php

namespace spec\AlexClooze\Phprainfuck\VirtualMachine;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpawnerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AlexClooze\Phprainfuck\VirtualMachine\Spawner');
    }

    function it_can_spawn_a_new_php_process()
    {
        $this->spawn()->shouldReturn(true);
    }
}
