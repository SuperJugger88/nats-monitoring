<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Basis\Nats\Client;
use Basis\Nats\Configuration;

class NatsPub extends Command
{
    protected $signature = 'nats-pub';

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

        $client->publish('some-topic', "we published a thing");

        return Command::SUCCESS;
    }
}
