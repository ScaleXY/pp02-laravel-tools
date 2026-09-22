<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunTrait
{
    protected static function booted()
    {
        $runAutoRunFunctions = static function ($instance, string $suffix, ?string $alternateSuffix = null): void {
            static $methodsByClass = [];

            $class = get_class($instance);
            $methods = $methodsByClass[$class] ??= array_values(array_filter(
                get_class_methods($instance),
                static fn (string $method): bool => str_starts_with($method, 'AutoRunFunctionTo')
            ));

            foreach ($methods as $method) {
                if (str_ends_with($method, $suffix)
                    || ($alternateSuffix !== null && str_ends_with($method, $alternateSuffix))) {
                    $instance->{$method}($instance);
                }
            }
        };

        foreach (['creating', 'created', 'updating', 'updated', 'deleting', 'deleted'] as $event) {
            $suffix = 'On'.ucfirst($event);
            $alternateSuffix = str_ends_with($event, 'ing') ? 'OnMutating' : 'OnMutated';

            static::{$event}(function ($instance) use ($runAutoRunFunctions, $suffix, $alternateSuffix): void {
                $runAutoRunFunctions($instance, $suffix, $alternateSuffix);
            });
        }
    }
}
