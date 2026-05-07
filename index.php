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

    return $months[$month];
}

function printSchedule(int $year, int $month): void
{
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $monthName = getMonthName($month);

    echo $monthName . ' ' . $year . PHP_EOL;
    echo str_repeat('-', 20) . PHP_EOL;

    $cycleDay = 1;

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $dayOfWeek = (int) date('N', mktime(0, 0, 0, $month, $day, $year));

        if ($cycleDay === 1) {
            if ($dayOfWeek >= 6) {
                echo $day . " (перенос на понедельник)" . PHP_EOL;
            } else {
                echo $day . " +" . PHP_EOL;
            }
        } else {
            echo $day . PHP_EOL;
        }

        $cycleDay++;

        if ($cycleDay > 3) {
            $cycleDay = 1;
        }
    }
}

printSchedule(2026, 5);