<?php

namespace App\Http\Livewire;

use App\Models\StatusPembayaran;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelStatusPembayaran extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $beforeTableSlot = 'pengelola.status-pembayaran.button';

    public function builder()
    {
        return StatusPembayaran::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/status-pembayaran', 10),

            Column::name('nama')
                ->searchable()
                ->editable(),

            Column::name('kode'),

            Column::delete()->label('Hapus')
        ];
    }
}