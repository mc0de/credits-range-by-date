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
            // Covers outer bounds
            ->where(function ($query) use ($range) {
                $query->where('from', '>=', reset($range))->where('to', '<=', end($range));
            })
            // Covers left and right bound
            ->orWhere(function ($query) use ($range) {
                $query->whereBetween('from', $range)->orWhereBetween('to', $range);
            })
            // Covers inner bounds
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
