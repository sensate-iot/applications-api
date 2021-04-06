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
        $status = 200;

        try {
            $name = $request->query('name', '');

            if(empty($name)) {
                $data = $this->service->all();
            } else {
                $data = $this->service->findOne($name);
            }
        } catch(Throwable $e) {
            Log::warning('Unable to fetch apps: ' . $e->getMessage());
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
            $status = 500;
        }

        return response()->json($data, $status);
    }
}
