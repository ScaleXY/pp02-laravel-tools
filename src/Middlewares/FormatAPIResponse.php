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
		if(is_array($resp_payload))
			if(array_key_exists("result", $resp_payload))
				return response()->json($resp_payload);
		return response()->json([
			"result"	=> true,
			"data"		=> $resp_payload,
		]);
    }

}
