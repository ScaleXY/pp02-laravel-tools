<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToAddMissingUUIDOnCreatingTrait
{
    public function AutoRunFunctionToAddMissingUUIDOnCreating($instance)
    {
        if (is_null($instance->uuid)) {
            $instance->uuid = \Illuminate\Support\Str::uuid7();
        }
    }
}
