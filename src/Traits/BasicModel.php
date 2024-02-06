<?php

namespace ScaleXY\Tools\Traits;

trait BasicModel
{
	public $timestamps = true;
	protected $guarded = ['id'];
}
