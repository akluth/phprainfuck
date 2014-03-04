<?php

namespace spec\DerAlex\Phprainfuck;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompilerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\Compiler');
    }
}
