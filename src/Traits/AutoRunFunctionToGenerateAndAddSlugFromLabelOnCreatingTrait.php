<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToGenerateAndAddSlugFromLabelOnCreatingTrait
{
	public function AutoRunFunctionToGenerateAndAddSlugFromLabelOnCreating($instance)
	{
		if(is_null($instance->slug))
			$instance->slug = \Illuminate\Support\Str::slug($instance->label);
	}
}
