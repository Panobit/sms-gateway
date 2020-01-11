<?php

namespace Panobit\SmsGateway\Drivers;

use Twilio\Rest\Client;
use Panobit\SmsGateway\Abstracts\Driver;
class Twilio extends Driver
{
    /**
     * Twilio Settings.
     *
     * @var object
     */
    protected $settings;

    /**
     * Twilio Client.
     *
     * @var Client
     */
    protected $client;


    public function __construct($settings)
    {
        $this->settings = (object) $settings;
        $this->client = new Client($this->settings->sid, $this->settings->token);
    }
    /**
     * Send text message and return response.
     *
     * @return object
     */
    public function send()
    {
        $response = collect();
        foreach ($this->recipients as $recipient) {
            $result = $this->client->account->messages->create(
                $recipient,
                ['from' => $this->settings->from, 'body' => $this->body]
            );
            $response->put($recipient, $result);
        }
        return (count($this->recipients) == 1) ? $response->first() : $response;
    }
}
