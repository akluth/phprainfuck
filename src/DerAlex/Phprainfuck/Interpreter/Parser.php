<?php

namespace DerAlex\Phprainfuck\Interpreter;

class Parser
{

    public function parse($tokens)
    {
        $openBrackets= 0;
        $closeBrackets = 0;

        foreach ($tokens as $token) {
            if ($token == '[') {
                $openBrackets++;
            }

            if ($token == ']') {
                $closeBrackets++;
            }
        }

        if ($openBrackets != $closeBrackets) {
            return false;
        }

        return true;
    }
}
