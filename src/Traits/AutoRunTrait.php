<?php

namespace ScaleXY\Tools\Traits;

use ReflectionClass;
use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunTrait
{
    protected static function booted()
    {
        $methodsByEvent = [];
        $registeredMethods = [];

        foreach ((new ReflectionClass(static::class))->getMethods() as $method) {
            foreach ($method->getAttributes(AutoRun::class) as $attribute) {
                foreach ($attribute->newInstance()->lifecycleEvents() as $event) {
                    $methodName = $method->getName();

                    if (isset($registeredMethods[$event][$methodName])) {
                        continue;
                    }

                    $methodsByEvent[$event][] = $method;
                    $registeredMethods[$event][$methodName] = true;
                }
            }
        }

        foreach (['creating', 'created', 'updating', 'updated', 'deleting', 'deleted'] as $event) {
            static::{$event}(function ($instance) use ($methodsByEvent, $event): void {
                foreach ($methodsByEvent[$event] ?? [] as $method) {
                    $method->invoke($instance, $instance);
                }
            });
        }
    }
}
