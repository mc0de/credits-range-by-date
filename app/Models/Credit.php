<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public function scopeValidSince($query, string $from)
    {
        return $query->where('from', '>=', $from);
    }

    public function scopeValidUntil($query, string $to)
    {
        return $query->where('to', '<=', $to);
    }

    public function scopeValidBetween($query, array $range = [])
    {
        return $query->validSince(reset($range))->validUntil(end($range));
    }

    public function scopeValidInBetween($query, string $date)
    {
        return $query->where('from', '<=', $date)->where('to', '>=', $date);
    }
}
