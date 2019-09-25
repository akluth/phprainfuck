<?php

namespace AlexClooze\Phprainfuck;

use AlexClooze\Phprainfuck\Interpreter\Lexer;
use AlexClooze\Phprainfuck\Interpreter\Parser;

class Phprainfuck
{
    private $lexer;
    private $parser;
    private $interpreter;
    private $vm;

    public function __construct()
    {
        $this->lexer = new Lexer();
        $this->parser = new Parser();
        $this->interpreter = new Interpreter();
    }


    public function evaluate($code)
    {
        $code = $this->lexer->lex($code);
        $this->parser->parse($code);
        return $this->interpreter->interprete($code);
    }

    public function createVirtualMachine($heapSize)
    {
        return new VirtualMachine($heapSize);
    }
}
