<?php


namespace Panobit\SmsGateway;

class SmsBuilder
{

    protected $recipients = [];

    protected $body;

    protected $driver;

    public function getRecipients()
    {
        return $this->getRecipients();
    }

    public function to($recipients)
    {
        $this->recipients = is_array($recipients) ? $recipients : [$recipients];
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function send($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function via($driver)
    {
        $this->driver = $driver;
        return $this;
    }
}
