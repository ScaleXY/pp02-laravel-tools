<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToGenerateAndAddSlugFromTitleOnCreatingTrait
{
	public function AutoRunFunctionToGenerateAndAddSlugFromTitleOnCreating($instance)
	{
		if(is_null($instance->slug))
			$instance->slug = \Illuminate\Support\Str::slug($instance->title);
	}
}
