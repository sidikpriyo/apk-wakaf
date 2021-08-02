<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = "donasi";

    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(StatusPembayaran::class, 'status_pembayaran_id');
    }

    public function metode()
    {
        return $this->belongsTo(MetodePembayaran::class, 'pembayaran_id');
    }

    public function donatur()
    {
        return $this->belongsTo(User::class, 'donatur_id');
    }

    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class, 'kampanye_id');
    }

    public function transaksi()
    {
        return $this->hasOne(DonasiTransaksi::class, 'donasi_id');
    }

    /**
     * Filter Lunas
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLunas(Builder $query)
    {
        return $query->whereNotNull('completed_at');
    }
}
