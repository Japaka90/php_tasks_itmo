<?php
/**
 * Created by PhpStorm.
 * User: Alesya
 * Date: 11.01.2017
 * Time: 16:24
 */

$timeMinutes = date('i');
$check = $timeMinutes%5;

echo ($check == 0 || $check == 1 || $check == 2 ? 'Зелёный свет' : 'Красный свет');