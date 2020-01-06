<?php

namespace AlexClooze\Phprainfuck\VirtualMachine;

class Spawner
{
    private $phpExecutable;
    private $descriptors;
    private $process;
    private $pipes;
    private $content;

    public function __construct($phpExecutable = 'php')
    {
        $this->phpExecutable = $phpExecutable;
        $this->descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w']
        ];
    }

    public function spawn()
    {
        $this->process = proc_open($this->phpExecutable, $this->descriptors, $this->pipes);

        if (is_resource($this->process)) {
            return true;
        } else {
            return false;
        }
    }

    public function write($data)
    {
        fwrite($this->pipes[0], "<?php\n" . $data . "\n?>\n");
        fclose($this->pipes[0]);
    }

    public function read()
    {
        $this->content = stream_get_contents($this->pipes[1]);
        fclose($this->pipes[1]);
    }

    public function destroy()
    {
        proc_close($this->process);
    }

    public function getContent()
    {
        return $this->content;
    }
}
