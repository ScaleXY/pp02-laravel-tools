<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToGenerateAndAddSlugFromNameOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToGenerateAndAddSlugFromNameOnCreating($instance)
    {
        if (is_null($instance->slug)) {
            $instance->slug = \Illuminate\Support\Str::slug($instance->name);
        }
    }
}
