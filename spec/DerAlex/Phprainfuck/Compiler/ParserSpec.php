<?php

namespace spec\AlexClooze\Phprainfuck\Compiler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AlexClooze\Phprainfuck\Compiler\Parser');
    }
}
