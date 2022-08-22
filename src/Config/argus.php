<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Robot Device Capture
    |--------------------------------------------------------------------------
    |
    | If the data is true, system capture the robot devices.
    |
    */
    'capture_robot' => env('ARGUS_CAPTURE_ROBOT', false),

    /*
    |--------------------------------------------------------------------------
    | EXCEPTION LOG
    |--------------------------------------------------------------------------
    |
    | If the data is true, all exception will be saved.
    |
    */
    'exception_log' => env('ARGUS_EXCEPTION_LOG', true),
];