<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use App\Services\EmployeePairsCalculator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function retrievePair(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|mimes:csv|max:1024',
        ]);

        $rows = (new EmployeesImport())->toArray($request->file('file'))[0];

        return response()->json([
            'pair' => (new EmployeePairsCalculator($rows))->getPair(),
        ]);
    }
}
