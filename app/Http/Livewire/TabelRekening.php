<?php

namespace App\Http\Livewire;

use App\Models\Rekening;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelRekening extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Rekening::class;
    public $beforeTableSlot = 'pengelola.rekening.button';

    public function builder()
    {
        return Rekening::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/rekening', 10),

            Column::name('nama')
                ->defaultSort()
                ->searchable()
                ->editable(),

            Column::name('nomor'),

            Column::name('bank.nama')->label('Bank'),

            Column::delete()->label('Hapus')
        ];
    }
}