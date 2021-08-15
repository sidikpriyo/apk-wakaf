<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;

    protected $table = "pencairan";

    protected $guarded = [];

    public function scopeMenunggu(Builder $query)
    {
        return $query->whereNull('completed_at');
    }
}
