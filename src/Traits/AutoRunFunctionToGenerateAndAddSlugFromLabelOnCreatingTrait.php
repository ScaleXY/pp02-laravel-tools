<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToGenerateAndAddSlugFromLabelOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToGenerateAndAddSlugFromLabelOnCreating($instance)
    {
        if (is_null($instance->slug)) {
            $instance->slug = \Illuminate\Support\Str::slug($instance->label);
        }
    }
}
