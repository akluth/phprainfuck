<?php
namespace DerAlex\Phprainfuck;

use DerAlex\Phprainfuck\Interpreter\Lexer;
use DerAlex\Phprainfuck\Interpreter\Parser;

class Interpreter
{
    private $heap;
    private $pointer;
    private $level;


    public function __construct()
    {
        $this->heap = [];
        foreach (range(0,65535) as $element) {
            $this->heap[$element] = 0;
        }

        $this->pointer = 0;
        $this->level = 0;
    }

    public function interprete($code)
    {
        $buffer = '';

        //TODO: This code is from my other brainfuck project "watisdat", it may
        // be better rewritten with a foreach construct...
        for ($instructionPointer = 0; $instructionPointer < count($code); $instructionPointer++) {
            switch ($code[$instructionPointer]) {
            case '>':
                $this->pointer++;
                break;
            case '<':
                $this->pointer--;
                break;
            case '+':
                $this->heap[$this->pointer]++;
                break;
            case '-':
                $this->heap[$this->pointer]--;
                break;
            case '.':
                $buffer .= chr($this->heap[$this->pointer]);
                break;
            case ',':
                //XXX: Currently not implemented.
                break;
            case '[':
                if ($this->heap[$this->pointer] == 0) {
                    for ($instructionPointer++; $this->level > 0 || $code[$instructionPointer] != ']'; $instructionPointer++) {
                        if ($code[$instructionPointer] == '[') {
                            $this->level++;
                        }

                        if ($code[$instructionPointer] == ']') {
                            $this->level--;
                        }
                    }
                }
                break;
            case ']':
                for ($instructionPointer--; $this->level > 0 || $code[$instructionPointer] != '['; $instructionPointer--) {
                    if ($code[$instructionPointer] == ']') {
                        $this->level++;
                    }

                    if ($code[$instructionPointer] == '[') {
                        $this->level--;
                    }
                }

                $instructionPointer--;
                break;
            }
        }

        return $buffer;
    }
}
