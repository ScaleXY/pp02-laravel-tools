<?php

namespace ScaleXY\Tools\Traits;

trait MorphableIdentifiers
{
    public function getMorphLabel()
    {
        $returnValue = \Illuminate\Support\Str::of(get_class($this))->afterLast('\\').' ['.$this->getKey().']';
        if (method_exists($this, 'getLabel')) {
            $returnValue .= ' '.$this->getLabel();
        }

        return $returnValue;
    }
}
