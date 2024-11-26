<?php

namespace Tests\Unit;

use App\Services\EmployeePairsCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EmployeePairsCalculatorTest extends TestCase
{
    #[DataProvider('getPairDataProvider')]
    public function testGetPair(array $set, array $result): void
    {
        [$employee, $otherEmployee, $overlappingDays] =
            (new EmployeePairsCalculator($set))->getPair();

        $this->assertEquals($result[0], $employee);
        $this->assertEquals($result[1], $otherEmployee);
        $this->assertEquals($result[2], $overlappingDays);
    }

    #[DataProvider('employeeAndProjectsListProvider')]
    public function testEmployeeAndProjectsList(array $set, array $result): void
    {
        $list = (new EmployeePairsCalculator($set))->getEmployeeAndProjectsList();

        $this->assertSameSize($result, $list);

        for ($i = 0; $i < count($result); $i++) {
            $this->assertEquals($result[$i][0], $list[$i][0]);
            $this->assertEquals($result[$i][1], $list[$i][1]);
            $this->assertEquals($result[$i][2], $list[$i][2]);
            $this->assertEquals($result[$i][3], $list[$i][3]);
        }
    }

    public static function employeeAndProjectsListProvider(): array
    {
        $result = [
            ["1", "2", 1, 3,],
            ["1", "3", 1, 4,],
            ["1", "4", 1, 6,],
            ["2", "3", 1, 4,],
            ["2", "4", 1, 4,],
            ["3", "4", 1, 5,],
            ["1", "2", 2, 0,],
            ["1", "4", 2, 0,],
            ["2", "4", 2, 0,],
        ];

        return [
            [self::getDataset(), $result]
        ];
    }

    public static function getPairDataProvider(): array
    {
        $result = [1, 4, 6];

        return [
            [self::getDataset(), $result]
        ];
    }

    private static function getDataset(): array
    {
        return [
            [1, 1, '2010-01-10', '2010-01-15'],
            [1, 2, '2010-01-16', '2010-01-25'],
            [2, 1, '2010-01-08', '2010-01-12'],
            [2, 2, '2010-01-13', '2010-01-15'],
            [3, 1, '2010-01-09', '2010-01-13'],
            [4, 1, '2010-01-09', '2010-01-16'],
            [4, 2, '2010-01-26', '2010-01-29'],
            [5, 3, '2010-01-09', '2010-01-16'],
        ];
    }
}
