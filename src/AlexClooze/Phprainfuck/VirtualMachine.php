<?php
namespace AlexClooze\Phprainfuck;

use AlexClooze\Phprainfuck\Interpreter\Lexer;
use AlexClooze\Phprainfuck\Interpreter\Parser;
use AlexClooze\Phprainfuck\VirtualMachine\Spawner;

class VirtualMachine
{
    private $heapSize;
    private $lexer;
    private $parser;
    private $interpreter;
    private $spawner;

    public function __construct($heapSize, $phpExecutable = 'php')
    {
        $this->heapSize = $heapSize;

        //TODO: Sharing is caring, do we really have to create new instances of
        //the lexer and parser?
        $this->lexer = new Lexer();
        $this->parser = new Parser();
        $this->interpreter = new Interpreter($heapSize);
        $this->spawner = new Spawner($phpExecutable);
    }

    public function run($code)
    {
        $code = $this->lexer->lex($code);
        $this->parser->parse($code);
        $code = $this->interpreter->interprete($code);

        if (!$this->execute($code)) {
            return false;
        }

        return true;
    }

    public function execute($code)
    {
        $this->spawner->spawn();
        $this->spawner->write($code);
        $this->spawner->read($code);

        if ($this->spawner->destroy() != 0) {
            return false;
        }

        return true;
    }

    public function result()
    {
        return $this->spawner->getContent();
    }
}
