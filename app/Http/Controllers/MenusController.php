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
        try {
            $data = $this->service->all();
        } catch(Throwable $e) {
            Log::info('Unable to fetch apps: ' . $e->getMessage());
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
        }

        return response()->json($data, 200);
    }
}
