<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Basis\Nats\Client;
use Basis\Nats\Configuration;

class NatsSub extends Command
{
    protected $signature = 'nats-sub';
    protected $description = 'Command description';

    public function handle()
    {
        $configuration = new Configuration([
            'host' => 'nats',
            'jwt' => null,
            'lang' => 'php',
            'pass' => null,
            'pedantic' => false,
            'port' => 4222,
            'reconnect' => true,
            'timeout' => 1,
            'token' => null,
            'user' => null,
            'nkey' => null,
            'verbose' => false,
            'version' => 'dev',
        ]);

        $client = new Client($configuration);

        $client->subscribe('some-topic', function ($message) {
            printf("Data: %s\r\n", $message);
        });

        while(true) {
            $client->process();
        }

        return Command::SUCCESS;

    }
}
