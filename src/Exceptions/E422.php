<?php

declare(strict_types=1);

namespace ScaleXY\Tools\Exceptions;

use Exception;

class E422 extends Exception
{
    public function __construct(string $message = 'Unprocessable Entity')
    {
        parent::__construct($message, 422);
    }
}
