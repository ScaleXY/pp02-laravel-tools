<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToHashPasswordOnCreatingTrait
{
    public function AutoRunFunctionToHashPasswordOnCreating($instance)
    {
        if (strlen($instance->Password) > 0) {
            $instance->Password = \Illuminate\Support\Facades\Hash::make($instance->Password);
        } else {
            unset($instance->Password);
        }
    }
}
