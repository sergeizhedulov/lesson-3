<?php

$a = 0;

do {
    if ($a == 0) {
        echo $a . " - это ноль<br>";
    } else if ($a & 1 != 0) {
        echo $a . " - нечетное число<br>";
    } else {
        echo $a . " - четное число<br>";
    }
    $a++;
} while ($a <= 10);