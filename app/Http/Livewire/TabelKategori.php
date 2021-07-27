<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelKategori extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Kategori::class;
    public $beforeTableSlot = 'pengelola.kategori.button';

    public function builder()
    {
        return Kategori::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/kategori', 10),

            Column::name('nama')
                ->defaultSort()
                ->searchable()
                ->editable(),

            Column::name('kode'),

            Column::delete()->label('Hapus')
        ];
    }
}
