<?php

namespace spec\DerAlex\Phprainfuck\Compiler;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\Compiler\Parser');
    }
}
