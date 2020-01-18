<?php

namespace Panobit\SmsGateway\Abstracts;

use Panobit\SmsGateway\Interfaces\SmsInterface;

abstract class Driver implements SmsInterface
{


    /**
     * To Numbers Array
     *
     * @var array
     */
    protected $recipients = [];

    /**
     * @var string
     */
    protected $body = '';

    /**
     * Driver constructor.
     * @param $settings
     */
    abstract public function __construct($settings);

    /**
     * @param $numbers
     * @return $this
     * @throws \Exception
     */
    public function to($numbers)
    {
        $recipients = is_array($numbers) ? $numbers : [$numbers];

        $recipients = array_map(function ($item) {
            return trim($item);
        }, array_merge($this->recipients, $recipients));

        $this->recipients = array_values(array_filter($recipients));

        if (count($this->recipients) < 1) {
            throw new \Exception('Message recipient can not be empty.');
        }

        return $this;
    }

    /**
     * @param $message
     * @return $this
     * @throws \Exception
     */
    public function message($message)
    {
        if (! is_string($message)) {
            throw new \Exception('Message text must be a string.');
        }
        if (trim($message) == '') {
            throw new \Exception('Message text can not be empty.');
        }
        $this->body = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    abstract public function send();



}
