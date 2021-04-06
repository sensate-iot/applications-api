<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use Throwable;

class MenusController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new MenusRepository();
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $status = 200;

        try {
            $data = $this->service->all();
        } catch(Throwable $e) {
            Log::warning('Unable to fetch apps: ' . $e->getMessage());
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
            $status = 500;
        }

        return response()->json($data, $status);
    }
}
