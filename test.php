<?php

use App\Models\Credit;

$case1 = ['2021-02-01 00:00:00', '2021-02-28 23:59:59'];
$case2 = ['2021-02-05 12:30:00', '2021-02-05 12:30:00'];

function checkDataset(string $from, string $to)
{
    $credits = Credit::query();

    $credits->when($from, function ($q, $from) {
        return $q->where('from', '>=', $from);
    })->when($to, function ($q, $to) {
        return $q->where('to', '<=', $to);
    });

    return $credits->get();
}

$res1 = checkDataset($case1[0], $case1[1]);
$res2 = checkDataset($case1[0], $case1[1]);

echo $res1->count() . "\n";
echo $res2->count() . "\n";
