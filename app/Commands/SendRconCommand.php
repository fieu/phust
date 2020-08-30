<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use WebSocket\BadOpcodeException;
use WebSocket\Client;
use WebSocket\TimeoutException;

class SendRconCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'rcon:send {--command= : Command to be sent to server (required)}
                                      {--ip= : IP of server (required)}
                                      {--port= : Port of server (required)}
                                      {--pass= : RCON Password (required)}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Send RCON command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $needs = [
            'command',
            'ip',
            'port',
            'pass',
        ];
        foreach ($needs as $need) {
            if (!array_key_exists($need, $this->options()) || empty($this->options()[$need])) {
                $this->error('Please pass all required options. See --help for all options.');
                exit(1);
            }
        }
        $client = new Client("ws://{$this->option('ip')}:{$this->option('port')}/{$this->option('pass')}");
        $data = json_encode([
            'Identifier' => 0,
            'Message' => $this->option('command'),
            'Stacktrace' => '',
            'Type' => 3
        ]);
        $client->send($data);
        $result = json_decode($client->receive());
        echo $result->Message;
        die(0);
    }
}
