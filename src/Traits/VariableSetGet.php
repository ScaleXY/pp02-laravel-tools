<?php

namespace ScaleXY\Tools\Traits;

trait VariableSetGet
{
    public static function setValue(string $key, $value)
    {
        return self::updateOrCreate([
            'key' => $key,
        ], [
            'value' => $value,
        ])->value;
    }

    public static function getValue(string $key, $value)
    {
        return self::where('key', $key)->first()->value ?? $value;
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
