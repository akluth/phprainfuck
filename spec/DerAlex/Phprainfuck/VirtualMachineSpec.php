<?php

namespace spec\DerAlex\Phprainfuck;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VirtualMachineSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(255);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DerAlex\Phprainfuck\VirtualMachine');
    }

    function it_can_run_code()
    {
        // echo "Hello World!"
        $code = <<<EOT
+++++ +++++ [->++ +++++ +++<] >+.-- .++++ +.+++ ++++. <++++ ++++[ ->---
----- <]>-- ----- ----- ---.+ +.<++ ++++[ ->+++ +++<] >++.< +++++ [->++
+++<] >.<++ +[->+ ++<]> ++..+ ++.<+ +++++ ++[-> ----- ---<] >---- -----
----- -.<++ +++++ [->++ +++++ <]>++ ++++. <+++[ ->+++ <]>++ +++.+ +++++
+.+++ +++++ .<+++ +++++ +[->- ----- ---<] >--.+ .<
EOT;
        $this->run($code)->shouldReturn(true);
    }

    function it_executes_code_and_gets_the_result()
    {
        $code = <<<EOT
+++++ +++++ [->++ +++++ +++<] >+.-- .++++ +.+++ ++++. <++++ ++++[ ->---
----- <]>-- ----- ----- ---.+ +.<++ ++++[ ->+++ +++<] >++.< +++++ [->++
+++<] >.<++ +[->+ ++<]> ++..+ ++.<+ +++++ ++[-> ----- ---<] >---- -----
----- -.<++ +++++ [->++ +++++ <]>++ ++++. <+++[ ->+++ <]>++ +++.+ +++++
+.+++ +++++ .<+++ +++++ +[->- ----- ---<] >--.+ .<
EOT;
        $this->run($code)->shouldReturn(true);
        $this->result()->shouldReturn("Hallo Welt!");
    }
}
