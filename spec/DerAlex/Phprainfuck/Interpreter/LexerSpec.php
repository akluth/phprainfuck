<?php

namespace spec\DerAlex\Phprainfuck\Interpreter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LexerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\Interpreter\Lexer');
    }

    function it_can_lex_a_string()
    {
        $string = <<<EOT
++++ # This is a test ----[++++
+]
EOT;

        $this->lex($string)->shouldReturn('++++----[++++]');
    }
}
