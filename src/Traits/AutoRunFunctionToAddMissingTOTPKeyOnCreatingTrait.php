<?php

namespace ScaleXY\Tools\Traits;

use ScaleXY\Tools\Attributes\AutoRun;

trait AutoRunFunctionToAddMissingTOTPKeyOnCreatingTrait
{
    #[AutoRun('creating')]
    public function AutoRunFunctionToAddMissingTOTPKeyOnCreating($instance)
    {
        if (is_null($instance->totp_key)) {
            $instance->totp_key = (\OTPHP\TOTP::create())->getSecret();
        }
    }
}
