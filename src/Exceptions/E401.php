<?php

declare(strict_types=1);

namespace ScaleXY\Tools\Exceptions;

use Exception;

class E401 extends Exception
{
    public function __construct(string $message = 'Unauthorized')
    {
        parent::__construct($message, 422);
    }
}
