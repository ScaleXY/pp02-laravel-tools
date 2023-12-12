<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunTrait
{
	protected static function booted()
	{
		static::creating(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -10) == "OnCreating")){
					$instance->{$function_name}($instance);
				}
			}
		});
		static::created(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -9) == "OnCreated")){
					$instance->{$function_name}($instance);
				}
			}
		});
		static::updating(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -10) == "OnUpdating")){
					$instance->{$function_name}($instance);
				}
			}
		});
		static::updated(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -9) == "OnUpdated")){
					$instance->{$function_name}($instance);
				}
			}
		});
		static::deleting(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -10) == "OnDeleting")){
					$instance->{$function_name}($instance);
				}
			}
		});
		static::deleted(function ($instance) {
			foreach (get_class_methods($instance) as $function_name) {
				if ((substr($function_name, 0, 17) == "AutoRunFunctionTo") && (substr($function_name, -9) == "OnDeleted")){
					$instance->{$function_name}($instance);
				}
			}
		});
	}

}
