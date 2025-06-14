<?php

namespace ScaleXY\Tools\Traits;

trait MorphableIdentifiers
{
    public function getMorphLabel()
    {
        $returnValue = basename($this).' ['.$this->getKey().']';
        if (method_exists($this, 'getLabel')) {
            $returnValue .= ' '.$this->getLabel();
        }

        return $returnValue;
    }
}
