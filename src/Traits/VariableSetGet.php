<?php

namespace ScaleXY\Tools\Traits;

trait VariableSetGet
{
    public static function getValue(string $key, $value = null)
    {
		$singletonInstance = app(self::class);

        if (! isset($singletonInstance->cacheStore[$key])) {
            $singletonInstance->cacheStore[$key] = self::where('key', $key)->first()->value
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

		$singletonInstance->cacheStore[$key] = $value;

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
