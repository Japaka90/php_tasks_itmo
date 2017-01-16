<?php
/* Задача №1.
Написать функцию, которая возвращает количество дней, оставшихся до нового года.
Функция должна корректно работать при запуске в любом году, т. е. грядущий год должен вычисляться программно. */

function countDays()
{
    $currentDay = date('z');
    $leapYear = date('L');
    if ($leapYear)
    {
        $daysBeforeNY = 365 - $currentDay;
    }
    else
    {
        $daysBeforeNY = 364 - $currentDay;
    }
    return $daysBeforeNY;
}

echo countDays();
