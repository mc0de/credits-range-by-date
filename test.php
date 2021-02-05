<?php

use App\Models\Credit;

$case1 = ['2021-02-05 00:00:00', '2021-02-10 23:59:59'];
$res1  = Credit::validForRange($case1);
echo $res1->pluck('id') . "\n";

$case2 = '2021-02-05 12:30:00';
$res2  = Credit::validForDate($case2);
echo $res2->pluck('id') . "\n";
