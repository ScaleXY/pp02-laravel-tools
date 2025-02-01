<?php

declare(strict_types=1);

namespace ScaleXY\Tools\Exceptions;

use Exception;

class E404 extends Exception
{
    public function __construct(string $message = 'Not found')
    {
        parent::__construct($message, 422);
    }
}
