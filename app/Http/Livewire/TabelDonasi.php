<?php

namespace App\Http\Livewire;

use App\Models\Donasi;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelDonasi extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Donasi::class;
    public $beforeTableSlot = 'pengelola.donasi.button';

    public function builder()
    {
        return Donasi::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/donasi', 10),

            Column::name('kampanye.nama')->label('Kampanye')->searchable()->defaultSort(),

            Column::name('donatur.name')->label('Donatur'),

            NumberColumn::name('nominal'),

            Column::name('metode.nama')->label('Metode Pembayaran'),

            Column::name('status.nama')->label('Status Pembayaran'),

            DateColumn::name('created_at')->label('Tanggal')
        ];
    }
}
