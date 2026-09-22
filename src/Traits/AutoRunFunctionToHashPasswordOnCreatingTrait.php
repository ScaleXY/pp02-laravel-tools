<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToHashPasswordOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToHashPasswordOnCreating($instance)
    {
        if (strlen($instance->Password) > 0) {
            $instance->Password = \Illuminate\Support\Facades\Hash::make($instance->Password);
        } else {
            unset($instance->Password);
        }
    }
}
