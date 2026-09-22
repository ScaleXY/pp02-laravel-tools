<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunTrait
{
    protected static function booted()
    {
        foreach (['creating', 'created', 'updating', 'updated', 'deleting', 'deleted'] as $event) {
            $suffix = 'On'.ucfirst($event);

            static::{$event}(function ($instance) use ($suffix) {
                foreach (get_class_methods($instance) as $method) {
                    if (str_starts_with($method, 'AutoRunFunctionTo') && str_ends_with($method, $suffix)) {
                        $instance->{$method}($instance);
                    }
                }
            });
        }
    }
}
