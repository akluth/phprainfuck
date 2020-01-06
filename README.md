# phprainfuck - Brainfuck interpreter and virtual machine in PHP

## What the heck is this?
It's a Brainfuck interpreter and (somewhat) virtual machine which makes
it possible to both evaluate brainfuck code as "pure" brainfuck code and
to evaluate brainfuck code as PHP code.

## Installation
Just add it to your composer.json:

    "require": {
        ...
        "AlexClooze/phprainfuck": "dev-master"
    }

and run `composer update`.

## Usage
There are two ways of using phprainfuck.

It all starts with creating a new instance of phprainfuck:

    use AlexClooze\Phprainfuck\Phprainfuck;

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

*Hint*: All code executed via the virtual machine is executed in a seperate
new PHP process.

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


## Running tests
phprainfuck is developed with the help of phpspec. Run `phpspec run` to run
the tests.
