<?php

namespace App\Http\Livewire;

use App\Models\Bank;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelBank extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Bank::class;
    public $beforeTableSlot = 'pengelola.bank.button';

    public function builder()
    {
        return Bank::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/bank', 10),

            Column::name('nama')
                ->defaultSort()
                ->searchable()
                ->editable(),

            Column::name('kode'),

            Column::delete()->label('Hapus')
        ];
    }
}