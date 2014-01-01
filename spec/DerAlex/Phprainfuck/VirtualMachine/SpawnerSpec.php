<?php

namespace spec\DerAlex\Phprainfuck\VirtualMachine;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpawnerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\VirtualMachine\Spawner');
    }

    function it_can_spawn_a_new_php_process()
    {
        $this->spawn()->shouldReturn(true);
    }
}
