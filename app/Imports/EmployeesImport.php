<?php

namespace App\Imports;

use App\Services\EmployeePairsCalculator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmployeesImport
{
    use Importable;
}
