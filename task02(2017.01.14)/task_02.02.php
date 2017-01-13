<?php

/* Задача №2. Закрепляем циклы и массивы
На входе имеем массив из целых чисел, например - [1, 2, 3, 8, 14, 89, 45]
На выходе должен быть массив с обратным порядком элементов: “перевертыш”.
Т.е. первый элемент массива будет последним, а последний - первым и т.д.
Полученный на выходе массив: [45, 89, 14, 8, 3, 2, 1]
Нельзя использовать:
    - конструкцию подобную такой - ​element = array[1]
    - встроенные функции для работы с массивами
    - добавлять или удалять элементы массива */

$arr = [1, 2, 3, 8, 14, 89, 45];
for ($i=0; $i <= (int)(count($arr))/2 - 1; $i++) {
    $arr[$i] += $arr[count($arr) -1 - $i];
    $arr[count($arr) -1 - $i] = $arr[$i] - $arr[count($arr) -1 - $i];
    $arr[$i] = $arr[$i] - $arr[count($arr) -1 - $i];
}

for ($i=0; $i < count($arr); $i++) {
    echo $arr[$i] . ' ';
}