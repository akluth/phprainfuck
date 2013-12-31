<?php

namespace spec\DerAlex\Phprainfuck\Interpreter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\Interpreter\Parser');
    }

    function it_can_parse_valid_code()
    {
        $token = [
            0 => '+',
            1 => '+',
            2 => '[',
            3 => '+',
            4 => '-',
            5 => '-',
            6 => ']'
        ];

        $this->parse($token)->shouldReturn(true);
    }

    function it_fails_when_parsing_faulty_code()
    {
        $token = [
            0 => '+',
            1 => '+',
            2 => '[',
            3 => '+',
            4 => '-',
            5 => '-'
        ];

        $this->parse($token)->shouldReturn(false);
    }
}
