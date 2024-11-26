<?php

namespace App\Services;

use Carbon\Carbon;

class EmployeeAndProjectsMap
{
    private array $map;
    private array $projects;

    public function __construct(array $dataSet)
    {
        $this->map = [];
        $this->setProjects($dataSet);
    }

    public function generateMap(): static
    {
        foreach ($this->projects as $projectId => $employees) {
            if (count($employees) === 1) {
                continue;
            }

            for ($i = 0; $i < count($employees); $i++) {
                for ($j = $i + 1; $j < count($employees); $j++) {
                    $this->map[] = [
                        $employees[$i]['id'],
                        $employees[$j]['id'],
                        $projectId,
                        $this->calculateOverlappingDays(
                            interval: [
                                'from_date' => $employees[$i]['from_date'],
                                'to_date' => $employees[$i]['to_date'],
                            ],
                            otherInterval: [
                                'from_date' => $employees[$j]['from_date'],
                                'to_date' => $employees[$j]['to_date'],
                            ]
                        ),
                    ];
                }
            }
        }

        return $this;
    }

    public function asArray(): array
    {
        return $this->map;
    }

    public function setProjects(array $dataSet): void
    {
        $this->projects = [];

        foreach ($dataSet as $row) {
            [$employeeId, $projectId, $fromDate, $toDate] = $row;

            $projectId = (string) $projectId;
            $employeeId = (string) $employeeId;
            $fromDate = Carbon::parse($fromDate);
            $toDate =
                $toDate === 'null' || $toDate === 'NULL' || $toDate === null
                    ? now()->toDateString()
                    : $toDate;

            Carbon::parse($toDate);

            if (!array_key_exists($projectId, $this->projects)) {
                $this->projects[$projectId] = [];
            }

            $this->projects[$projectId][] = [
                'id' => $employeeId,
                'from_date' => $fromDate,
                'to_date' => $toDate,
            ];
        }
    }

    private function calculateOverlappingDays(
        array $interval,
        array $otherInterval
    ): int {
        $start = max($interval['from_date'], $otherInterval['from_date']);

        $end = min($interval['to_date'], $otherInterval['to_date']);

        if ($start <= $end) {
            return $start->diffInDays($end) + 1;
        }

        return 0;
    }
}
