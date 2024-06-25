<?php

namespace ScaleXY\Tools\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormatAPIResponse
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $resp_payload = $response->original;
        if (is_array($resp_payload)) {
            if (array_key_exists('raw_response', $resp_payload)) {
                return response()->json($resp_payload['raw_response']);
            }
            if (array_key_exists('result', $resp_payload)) {
                return response()->json($resp_payload);
            }
            if (array_key_exists('message', $resp_payload)) {
                $message = $resp_payload['message'];
                unset($resp_payload['message']);
            }
        }

        return response()->json([
            'result' => true,
            'message' => $message ?? 'Request successful',
            'data' => $resp_payload,
        ]);
    }
}
