<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public function scopeValidForRange($query, array $range = [])
    {
        return $query->whereBetween('from', $range)->orWhereBetween('to', $range);
    }

    public function scopeValidForDate($query, string $date)
    {
        return $query->where('from', '<=', $date)->where('to', '>=', $date);
    }
}
