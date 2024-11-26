<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvRequest;
use App\Imports\EmployeesImport;
use App\Services\EmployeePairsCalculator;

class EmployeesController extends Controller
{
    public function showMaxOverlapPair(CsvRequest $request)
    {
        $rows = (new EmployeesImport())->toArray($request->file('file'))[0];

        return view('max-overlap-pair', [
            'pair' => (new EmployeePairsCalculator($rows))->getMaxOverlapPair(),
        ]);
    }

    public function showPairs(CsvRequest $request)
    {
        $rows = (new EmployeesImport())->toArray($request->file('file'))[0];

        return view('pairs', [
            'rows' => (new EmployeePairsCalculator(
                $rows
            ))->getEmployeeAndProjectsList(),
        ]);
    }

    public function showForm()
    {
        return view('form');
    }
}
