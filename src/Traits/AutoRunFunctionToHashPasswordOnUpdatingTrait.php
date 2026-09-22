<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToHashPasswordOnUpdatingTrait
{
    #[AutoRun('updating')]
    public function AutoRunFunctionToHashPasswordOnUpdating($instance)
    {
        if (strlen($instance->Password) > 0) {
            if ($instance->Password != self::find($instance->id)->Password) {
                $instance->Password = \Illuminate\Support\Facades\Hash::make($instance->Password);
            }
        } else {
            unset($instance->Password);
        }
    }
}
