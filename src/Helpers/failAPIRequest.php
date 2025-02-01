<?php

function failAPIRequest($message = 'An error occurred', $code = 422)
{
    $class_app = 'ScaleXY\\Tools\\Exceptions\\E'.$code;
    if (class_exists($class_app)) {
        throw new $class_app($message, $code);
    }
    throw new Exception($message, $code);
}
