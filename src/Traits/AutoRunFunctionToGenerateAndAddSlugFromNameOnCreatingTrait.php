<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToGenerateAndAddSlugFromNameOnCreatingTrait
{
	public function AutoRunFunctionToGenerateAndAddSlugFromNameOnCreating($instance)
	{
		if(is_null($instance->slug))
			$instance->slug = \Illuminate\Support\Str::slug($instance->name);
	}
}
