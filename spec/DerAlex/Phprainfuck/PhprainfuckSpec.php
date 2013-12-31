<?php

namespace spec\DerAlex\Phprainfuck;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhprainfuckSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\Phprainfuck');
    }

    function it_returns_hello_world()
    {
        $string = <<<EOT
+++++ +++[- >++++ ++++< ]>+++ +++++ .<+++ ++[-> +++++ <]>++ ++.++ +++++
..+++ .<+++ +++++ [->-- ----- -<]>- ----- ----- ----. <++++ +++[- >++++
+++<] >++++ ++.<+ +++[- >++++ <]>++ +++++ +.+++ .---- --.-- ----- -.<++
+++++ +[->- ----- --<]> ---.<
EOT;

        $this->evaluate($string)->shouldReturn('Hello World!');
    }

    function it_creates_a_new_virtual_machine()
    {
        $this->createVirtualMachine(255)->shouldReturnAnInstanceOf('\DerAlex\Phprainfuck\VirtualMachine');
    }
}
