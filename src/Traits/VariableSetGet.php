<?php

namespace ScaleXY\Tools\Traits;

trait VariableSetGet
{
	public static function setValue(string $key, $value)
	{
		return Self::updateOrCreate([
			'key' => $key,
		], [
			'value' => $value
		])->value;
	}
	public static function getValue(string $key, $value)
	{
		return Self::where('key', $key)->first()->value ?? $value;
	}
}
