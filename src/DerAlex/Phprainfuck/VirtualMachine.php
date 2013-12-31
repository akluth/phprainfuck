<?php
namespace DerAlex\Phprainfuck;

use DerAlex\Phprainfuck\Interpreter\Lexer;
use DerAlex\Phprainfuck\Interpreter\Parser;


class VirtualMachine
{
    private $heapSize;
    private $lexer;
    private $parser;
    private $interpreter;

    public function __construct($heapSize)
    {
        $this->heapSize = $heapSize;

        //TODO: Sharing is caring, do we really have to create new instances of
        //the lexer and parser?
        $this->lexer = new Lexer();
        $this->parser = new Parser();
        $this->interpreter = new Interpreter($heapSize);
    }

    public function run($code)
    {
        $code = $this->lexer->lex($code);
        $this->parser->parse($code);
        $code = $this->interpreter->interprete($code);

        //TODO: Error handling etc.
        eval($code);

        return true;
    }
}
