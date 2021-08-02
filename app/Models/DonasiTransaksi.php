<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiTransaksi extends Model
{
    use HasFactory;

    protected $table = "donasi_transaksi";

    protected $guarded = [];
}
