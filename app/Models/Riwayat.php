<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = "riwayat";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'donatur_id');
    }

    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class, 'kampanye_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
