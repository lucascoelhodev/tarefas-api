<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoggerService;

class LogController extends Controller
{
    protected LoggerService $logs;
    public function __construct(LoggerService $logs)
    {
        $this->logs = $logs;
    }
    public function index(Request $request)
    {
        $id = $request->query('id');
        $logs = $this->logs->getLogs($id ? (int)$id : null);
        return response()->json([
            'success' => true,
            'data' => $logs
        ]);
    }
}
