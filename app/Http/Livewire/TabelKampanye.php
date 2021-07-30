<?php

namespace App\Http\Livewire;

use App\Models\Kampanye;
use Mediconesystems\LivewireDatatables\BooleanColumn;
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
    public $linkTo = 'pengelola/kampanye';

    public function __construct()
    {
        if (auth()->user()->role === 'lembaga') {
            $this->beforeTableSlot = 'lembaga.kampanye.button';
            $this->linkTo = 'lembaga/kampanye';
        }
    }

    public function builder()
    {
        $user = auth()->user();
        return Kampanye::query()->when($user->role === 'lembaga', function ($query) use ($user) {
            $query->where('lembaga_id', '=', $user->id);
        });
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo($this->linkTo, 10),

            Column::name('nama')
                ->defaultSort()
                ->searchable(),

            Column::name('kategori.nama')->label('Kategori'),

            NumberColumn::name('kebutuhan'),

            NumberColumn::name('terkumpul'),

            BooleanColumn::name('tanggal_publikasi')->label('Disetujui'),

            Column::name('lembaga.name')->label('Lembaga'),

            DateColumn::name('tanggal_berakhir')->label('Berakhir')
        ];
    }
}
