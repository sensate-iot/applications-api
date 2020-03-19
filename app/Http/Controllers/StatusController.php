<?php

/*
 * StatusController.
 *
 * @author Michel Megens
 * @email  michel@michelmegens.net
 */

namespace App\Http\Controllers;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json(["status" => "ok"]);
    }
}
