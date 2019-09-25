<?php

namespace spec\AlexClooze\Phprainfuck;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompilerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AlexClooze\Phprainfuck\Compiler');
    }
}
