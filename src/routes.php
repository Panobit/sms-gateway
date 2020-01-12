<?php

Route::get('calculator', function(){
    $test = "Test 123";
    event(new \Panobit\SmsGateway\Events\MessageSent($test));
    echo 'Hello from the calculator package!';

});
