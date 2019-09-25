<?php

namespace spec\AlexClooze\Phprainfuck\Components;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConsoleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AlexClooze\Phprainfuck\Components\Console');
    }

    function it_exits_on_exit()
    {
        $this->parse('exit')->shouldReturn(false);
    }
}
