<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ApplicationRepository();
    }

    public function find(string $name)
    {
        try {
            $data = $this->service->findOne($name);
        } catch(\Throwable $e) {
            $data = ['errorCode' => 0,
                'message' => "Unable to fetch apps."];
        }

        return response()->json($data, 200);
    }

    public function index(Request $request)
    {
        $role = $request->query('role', 'Anonymous');
        $name = $request->query('name', '');

        if(!empty($role)) {
            $data = $this->service->findByRole($role, $name);
        } else {
            $data = $this->service->findByName($name);
        }

        return response()->json($data, 200);
    }
}
