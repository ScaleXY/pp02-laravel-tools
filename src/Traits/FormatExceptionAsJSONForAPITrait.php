<?php

namespace ScaleXY\Tools\Traits;

trait FormatExceptionAsJSONForAPITrait
{
    public function FormatExceptionAsJSONForAPI($e)
    {
        $message_parts = explode('|', $e->getMessage());
        if (count($message_parts) > 1) {
            return response()->json([
                'result' => false,
                'handled_error' => true,
                'error_code' => (int) $message_parts[0],
                'message' => $message_parts[1],
            ]);
        }

        return response()->json([
            'result' => false,
            'handled_error' => false,
            'error_code' => $e->getCode(),
            'message' => $message_parts[0],
            'meta' => [
                'file' => 'app/'.(explode('/app/', $e->getFile())[1] ?? '<redacted>'),
                'line' => $e->getLine(),
            ],
        ], 500);
    }
}
