<?php

use App\Models\Credit;

$case1 = ['2021-02-01 00:00:00', '2021-02-28 23:59:59'];
$res1  = Credit::validBetween($case1);

$case2 = '2021-02-05 12:30:00';
$res2  = Credit::validInBetween($case2);

echo $res1->count() . "\n";
echo $res2->count() . "\n";
