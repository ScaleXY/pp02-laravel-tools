<?php

namespace ScaleXY\Tools\Traits;

trait AutoRunFunctionToAddMissingTOTPKeyOnCreatingTrait
{
    public function AutoRunFunctionToAddMissingTOTPKeyOnCreating($instance)
    {
        if (is_null($instance->totp_key)) {
            $instance->totp_key = (\OTPHP\TOTP::create())->getSecret();
        }
    }
}
