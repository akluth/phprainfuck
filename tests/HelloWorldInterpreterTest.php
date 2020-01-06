<?php
declare(strict_types=1);

use AlexClooze\Phprainfuck\Phprainfuck;
use PHPUnit\Framework\TestCase;

final class HelloWorldInterpreterTest extends TestCase
{
    public function testCanInterpretAndExecuteHelloWorldBrainfuckCode(): void
    {
        $brainfuck = new Phprainfuck();
        $code = <<<EOT
+++++ +++[- >++++ ++++< ]>+++ +++++ .<+++ ++[-> +++++ <]>++ ++.++ +++++
..+++ .<+++ +++++ [->-- ----- -<]>- ----- ----- ----. <++++ +++[- >++++
+++<] >++++ ++.<+ +++[- >++++ <]>++ +++++ +.+++ .---- --.-- ----- -.<++
+++++ +[->- ----- --<]> ---.< 
EOT;
        $this->assertEquals("Hello World!", $brainfuck->evaluate($code));
    }
}
