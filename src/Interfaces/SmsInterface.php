<?php


namespace Panobit\SmsGateway\Interfaces;


interface SmsInterface
{
    public function to($numbers);

    public function message($message);

    public function send();
}
