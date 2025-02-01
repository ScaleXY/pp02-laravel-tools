<?php

declare(strict_types=1);

namespace ScaleXY\Tools\Exceptions;

use Exception;

class E403 extends Exception
{
    public function __construct(string $message = 'Forbidden')
    {
        parent::__construct($message, 422);
    }
}
