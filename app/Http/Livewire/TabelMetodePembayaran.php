<?php

namespace App\Http\Livewire;

use App\Models\MetodePembayaran;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelMetodePembayaran extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = MetodePembayaran::class;
    public $beforeTableSlot = 'pengelola.metode-pembayaran.button';

    public function builder()
    {
        return MetodePembayaran::query();
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

            Column::name('jenis.nama')->label('Jenis'),

            Column::delete()->label('Hapus')
        ];
    }
}
