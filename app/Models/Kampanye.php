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

    public function getTanggalBerakhirAttribute($date)
    {
        $hari = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($date), false);

        return $hari > 0 ? $hari . ' hari lagi' : 'Telah berakhir';
    }
}
