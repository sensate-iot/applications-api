<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ApplicationsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ApplicationRepository();
    }

    /**
     * @param string $name
     * @return JsonResponse
     */
    public function find(string $name)
    {
        try {
            $data = $this->service->findOne($name);
        } catch(Throwable $e) {
            Log::info('Unable to fetch apps: ' . $e->getMessage());
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
        }

        return response()->json($data, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $name = $request->query('name', '');

            if(empty($name)) {
                $data = $this->service->all();
            } else {
                $data = $this->service->findOne($name);
            }
        } catch(Throwable $e) {
            Log::info('Unable to fetch apps: ' . $e->getMessage());
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
        }

        return response()->json($data, 200);
    }
}
