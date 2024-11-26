<?php

namespace App\Services;

class EmployeePairsCalculator
{
    public function __construct(private readonly array $rows)
    {

    }

    public function getPair(): array
    {
        $mapping = $this->getEmployeeAndProjectsList();
        $maxOverlap = 0;
        $maxOverlapRow = [];

        foreach ($mapping as $row) {
            if ($row[3] > $maxOverlap) {
                $maxOverlapRow = $row;
                $maxOverlap = $row[3];
            }
        }

        return [$maxOverlapRow[0], $maxOverlapRow[1], $maxOverlapRow[3]];
    }

    /**
     * Returns an array with a list of each two employees who have worked
     * on a common project, as well as the number of days they have worked
     * in the following format: Employee ID #1, Employee ID #2, Project ID, Days worked
     */
    public function getEmployeeAndProjectsList(): array
    {
        return (new EmployeeAndProjectsMap($this->rows))
            ->generateMap()
            ->asArray();

    }
}
