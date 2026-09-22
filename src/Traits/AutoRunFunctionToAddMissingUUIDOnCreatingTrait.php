<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToAddMissingUUIDOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToAddMissingUUIDOnCreating($instance)
    {
        if (is_null($instance->uuid)) {
            $instance->uuid = \Illuminate\Support\Str::uuid7()->toString();
        }
    }
}
