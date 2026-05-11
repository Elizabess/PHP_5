<?php
declare(strict_types=1);

function getMonthName(int $month): string
{
    $months = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    return $months[$month] ?? '';
}

function printSchedule(int $year, int $month): void
{
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $monthName = getMonthName($month);

    echo $monthName . ' ' . $year . PHP_EOL;
    echo str_repeat('-', 20) . PHP_EOL;

    $nonWorkingDays = 2;
    $workingCount = 0;
    $weekendCount = 0;

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $dayOfWeek = (int) date('N', mktime(0, 0, 0, $month, $day, $year));

        if ($dayOfWeek >= 6) {
            echo $day . ' - выходной' . PHP_EOL;
            $nonWorkingDays++;
            $weekendCount++;
            continue;
        }

        if ($nonWorkingDays <= 2) {
            echo $day . ' - выходной' . PHP_EOL;
            $nonWorkingDays++;
            $weekendCount++;
        } else {
            echo $day . ' - рабочий' . PHP_EOL;
            $nonWorkingDays = 0;
            $workingCount++;
        }
    }
    echo 'Рабочих дней: ' . $workingCount . PHP_EOL;
    echo 'Выходных дней: ' . $weekendCount . PHP_EOL;
}

printSchedule(2025, 2);