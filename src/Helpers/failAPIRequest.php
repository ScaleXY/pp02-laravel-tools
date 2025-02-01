<?php

function failAPIRequest($message = 'An error occurred', $code = 422)
{
    $class_app = 'ScaleXY\\Tools\\Exceptions\\E'.$code;
    if (config('app.api_debug')) {
        \Illuminate\Support\Facades\Log::error('failAPIRequest: ['
            .debug_backtrace(1)[0]['class'].': L'.debug_backtrace(1)[0]['line']
            .'] '.($message ?? 'NO_MESSAGE'));
    }
    if (class_exists($class_app)) {
        throw new $class_app($message, $code);
    }
    throw new Exception($message, $code);
}
