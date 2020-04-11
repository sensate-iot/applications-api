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
