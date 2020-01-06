<?php
namespace AlexClooze\Phprainfuck;

use AlexClooze\Phprainfuck\Interpreter\Lexer;
use AlexClooze\Phprainfuck\Interpreter\Parser;

class Interpreter
{
    private $heap;
    private $pointer;
    private $level;
    private $heapSize;


    public function __construct($heapSize = 0)
    {
        $this->heapSize = $heapSize;
        $this->heap = [];
        foreach (range(0, $heapSize) as $cell) {
            $this->heap[$cell] = 0;
        }

        $this->pointer = 0;
        $this->level = 0;
    }

    /**
     * If the heapSize is equals 0 we're working with a dynamically heap
     **/
    public function interprete($code)
    {
        if ($this->heapSize == 0) {
            foreach (range(0, count($code)) as $cell) {
                $this->heap[$cell] = 0;
            }
        }

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

        if ($this->heapSize == 0) {
            foreach ($this->heap as $i => $value) {
                unset($this->heap[$i]);
            }
        }

        return $buffer;
    }
}
