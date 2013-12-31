<?php

namespace DerAlex\Phprainfuck\Interpreter;

class Lexer
{

    public function lex($string)
    {
        // Remove whitespace
        $string = preg_replace('/\s+/m', '', $string);

        preg_match_all('/[+\-\[\]\.\,]/', $string, $token);

        // preg_match_all is returning an array with one element - the array
        // with the values we actual want...stupid behaviour
        $token = $token[0];
        return $token;
    }
}
