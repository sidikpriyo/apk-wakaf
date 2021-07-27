<?php

namespace App\Http\Livewire;

use App\Models\Kampanye;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelKampanye extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Kampanye::class;
    public $beforeTableSlot = 'pengelola.kampanye.button';

    public function builder()
    {
        return Kampanye::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/kampanye', 10),

            Column::name('nama')
                ->defaultSort()
                ->searchable()
                ->editable(),

            Column::name('kategori.nama')->label('Kategori'),

            NumberColumn::name('kebutuhan'),

            NumberColumn::name('terkumpul'),

            Column::name('lembaga.name')->label('Lembaga'),

            DateColumn::name('tanggal_berakhir')->label('Berakhir')
        ];
    }
}
