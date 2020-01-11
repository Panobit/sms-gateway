<?php
if (!function_exists('sms')) {

    /**
     * Access SmsManager through helper.
     * @return \Panobit\SmsGateway\SmsManager
     */
    function sms()
    {
        return app('panobit-sms');
    }
}
