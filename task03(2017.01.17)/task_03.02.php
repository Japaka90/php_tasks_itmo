<?php

/* Задача №2.
Написать функцию, которая проверяет, является ли переданное число или строка палиндромом и возвраащет true.
В противном случаи возвращает false.
Палиндром — это число или текст, который читается одинаково и слева, и справа: 939; 49094; 11311. */

$wtext = 'adda';

function palindrom ($text)
{
    $text2 = strrev($text);
    if ($text == $text2)
    {
        return true;
    }
    else
    {
        return false;
    }
}
echo palindrom($wtext);

