# phprainfuck - Brainfuck interpreter and virtual machine in PHP

## What the heck is this?
It's a Brainfuck interpreter and (somewhat) virtual machine which makes
it possibile to both evaluta brainfuck code as "pure" brainfuck code and
to evaluate brainfuck code as PHP code.

## Installation
Just add it to your composer.json:

    "require": {
        ...
        "deralex/phprainfuck": "dev-master"
    }

and run `composer update`.

## Usage
There are two ways of using phprainfuck.

It all starts with creating a new instance of phprainfuck:

    use DerAlex\Phprainfuck\Phprainfuck;

    $phprain = new Phprainfuck();

After this you've got two options.

### Interpreting brainfuck code "as is"
Here's an example on using the `evaluate` method to just interprete pure brainfuck
code:

    $code = <<<EOT
    +++++ +++[- >++++ ++++< ]>+++ +++++ .<+++ ++[-> +++++ <]>++ ++.++ +++++
    ..+++ .<+++ +++++ [->-- ----- -<]>- ----- ----- ----. <++++ +++[- >++++
    +++<] >++++ ++.<+ +++[- >++++ <]>++ +++++ +.+++ .---- --.-- ----- -.<++
    +++++ +[->- ----- --<]> ---.< 
    EOT;

    print $phprain->evaluate($code);

This will print "Hello World!".

### Evaluating brainfuck code as PHP code
Here's an example on creating a new virtual machine and executing brainfuck
code as PHP code in it.

*Warning*: Of course this is _not_ a real virtual machine _yet_. PHP code is
executed in the same context as the actual PHP process. Further improvements
are coming.

    $code = <<<EOT
    +++++ +++++ [->++ +++++ +++<] >++++ +++++ +++++ ++++. <++++ [->-- --<]>
    ----- .<+++ +[->+ +++<] >+.<+ +++[- >---- <]>-- -.+++ ++.<+ +++[- >++++
    <]>+. ----- ---.+ ++.<+ +++++ ++[-> ----- ---<] >---- ----. ----- -.<++
    ++++[ ->+++ +++<] >++.< +++++ [->++ +++<] >++++ .++++ +++.. +++.< +++++
    +++[- >---- ----< ]>--- ----- ----- --.<+ +++++ +[->+ +++++ +<]>+ +++++
    .<+++ +[->+ +++<] >++++ ++++. +++.- ----- .---- ----. <++++ ++++[ ->---
    ----- <]>-- -.+.+ +++++ +.<++ ++[-> ++++< ]>++. <
    EOT;

    $vm = $phprain->createVirtualMachine(255);
    $vm->run($code);

The argument given by `createVirtualMachine` is the actual heap size.
The above code will evaluate to `var_dump("Hello World!");` and will print
`string(12) "Hello World!"`.

