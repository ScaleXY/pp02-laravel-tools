<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToGenerateAndAddSlugFromTitleOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToGenerateAndAddSlugFromTitleOnCreating($instance)
    {
        if (is_null($instance->slug)) {
            $instance->slug = \Illuminate\Support\Str::slug($instance->title);
        }
    }
}
