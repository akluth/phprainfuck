<?php

namespace DerAlex\Phprainfuck;

class VirtualMachine
{
    private $heapSize;
    private $interpreter;

    public function __construct($heapSize)
    {
        $this->heapSize = $heapSize;
        $this->interpreter = new Interpreter($heapSize);
    }
}
