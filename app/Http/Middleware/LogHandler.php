<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;
use Laravel\Lumen\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogHandler
{
    private $start;

    public function __construct()
    {
        $this->start = 0;
    }

    public function handle($req, Closure $closure)
    {
        $this->start = microtime(true);
        return $closure($req);
    }

    public function terminate(Request $req, Response $resp)
    {
        $end = microtime(true);

        Log::info("=== API call done ===");
        Log::info('Duration: '. number_format($end - $this->start, 3));

        Log::info('Method: ' . $req->getMethod());
        Log::info('URL: ' . $req->fullUrl());
        Log::info('IP Address: ' . $req->getClientIp());
        Log::info('Status code: ' . $resp->getStatusCode());
        Log::info("=====================");

    }
}
