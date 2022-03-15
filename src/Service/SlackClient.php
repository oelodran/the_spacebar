<?php

namespace App\Service;

use App\Helper\LoggerTrait;
use Nexy\Slack\Client;

class SlackClient
{
    use LoggerTrait;

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendMessage(string $from, string $message)
    {
        $this->logInfo('Jsei sadio krompire', [
            'message' => $message
        ]);

        $slackMessage = $this->client->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message);

        $this->client->sendMessage($slackMessage);
    }
}
