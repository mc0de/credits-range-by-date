<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public function scopeValidForRange($query, array $range = [])
    {
        return $query
            ->where(function ($query) use ($range) {
                $query->where('from', '>=', reset($range))->where('to', '<=', end($range));
            })
            ->orWhere(function ($query) use ($range) {
                $query->whereBetween('from', $range)->orWhereBetween('to', $range);
            })
            ->orWhere(function ($query) use ($range) {
                $query->where('from', '<=', reset($range))
                    ->where('to', '>=', end($range));
            });
    }

    public function scopeValidForDate($query, string $date)
    {
        return $query->where('from', '<=', $date)->where('to', '>=', $date);
    }
}
