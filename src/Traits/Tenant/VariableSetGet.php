<?php

namespace ScaleXY\Tools\Traits\Tenant;

trait VariableSetGet
{
    public static function getValue(string $key, $value = null)
    {
        $singletonInstance = app(self::class);
        if (! isset($singletonInstance->cacheStore[tenant('id')])) {
            $singletonInstance->cacheStore[tenant('id')] = [];
        }

        if (! isset($singletonInstance->cacheStore[tenant('id')][$key])) {
            $singletonInstance->cacheStore[tenant('id')][$key] = self::where('key', $key)->first()->value
                ?? $value
                ?? self::failOverValue($key);
        }

        return $singletonInstance->cacheStore[$key];
    }

    public static function setValue(string $key, $value)
    {
        self::updateOrCreate([
            'key' => $key,
        ], [
            'value' => $value,
        ])->value;
        $singletonInstance = app(self::class);

        $singletonInstance->cacheStore[tenant('id')][$key] = $value;

        return $value;
    }

    public static function getInstance(string $key)
    {
        return self::where('key', $key)->first();
    }

    public static function hasValue(string $key)
    {
        return self::where('key', $key)->count() > 0;
    }
}
