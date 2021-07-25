<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    use HasFactory;

    protected $table = "kampanye";

    protected $guarded = [];

    public function lembaga()
    {
        return $this->belongsTo(User::class, 'lembaga_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
