<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function donasi()
    {
        return $this->hasMany(Donasi::class, 'kampanye_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function getKapanBerakhirAttribute()
    {
        $hari = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($this->tanggal_berakhir), false);

        return $hari > 0 ? $hari . ' hari lagi' : 'Telah berakhir';
    }

    /**
     * Filter Kampanye Aktif
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAktif(Builder $query)
    {
        return $query->whereNotNull('tanggal_publikasi');
    }
}
