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
+ wat is dat
- foo
. bar
EOT;

        $this->lex($string)->shouldHaveValue('+');
        $this->lex($string)->shouldHaveValue('-');
        $this->lex($string)->shouldHaveValue('.');
    }

    public function getMatchers()
    {
        return [
            'haveKey' => function($subject, $key) {
                return array_key_exists($key, $subject);
            },
            'haveValue' => function($subject, $value) {
                return in_array($value, $subject);
            }
        ];
    }
}
