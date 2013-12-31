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
        // var_dump("Hello World!");
        $code = <<<EOT
+++++ +++++ [->++ +++++ +++<] >++++ +++++ +++++ ++++. <++++ [->-- --<]>
----- .<+++ +[->+ +++<] >+.<+ +++[- >---- <]>-- -.+++ ++.<+ +++[- >++++
<]>+. ----- ---.+ ++.<+ +++++ ++[-> ----- ---<] >---- ----. ----- -.<++
++++[ ->+++ +++<] >++.< +++++ [->++ +++<] >++++ .++++ +++.. +++.< +++++
+++[- >---- ----< ]>--- ----- ----- --.<+ +++++ +[->+ +++++ +<]>+ +++++
.<+++ +[->+ +++<] >++++ ++++. +++.- ----- .---- ----. <++++ ++++[ ->---
----- <]>-- -.+.+ +++++ +.<++ ++[-> ++++< ]>++. <
EOT;
        $this->run($code)->shouldReturn(true);
    }
}