<?php

namespace App\Http\Livewire;

use App\Models\JenisPembayaran;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelJenisPembayaran extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $beforeTableSlot = 'pengelola.jenis-pembayaran.button';

    public function builder()
    {
        return JenisPembayaran::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/jenis-pembayaran', 10),

            Column::name('nama')
                ->searchable()
                ->editable(),

            Column::name('kode'),

            Column::delete()->label('Hapus')
        ];
    }
}