<?php

namespace App\Http\Livewire;

use App\Models\Kampanye;
use App\Models\Kategori;
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
                ->filterable()
                ->linkTo($this->linkTo, 10),

            Column::name('nama')
                ->defaultSort()
                ->filterable()
                ->searchable(),

            Column::name('kategori.nama')->filterable($this->kategori)->label('Kategori'),

            BooleanColumn::name('tanggal_publikasi')->label('Publikasi')->filterable(),

            Column::name('lembaga.name')->label('Lembaga')->filterable()->hide(),

            NumberColumn::callback('kebutuhan', function ($kebutuhan) {
                return "Rp" . number_format($kebutuhan);
            })->label('Kebutuhan')->filterable(),

            NumberColumn::callback('terkumpul', function ($terkumpul) {
                return "Rp" . number_format($terkumpul);
            })->label('Terkumpul')->filterable(),

            DateColumn::name('tanggal_berakhir')->label('Berakhir')->filterable()
        ];
    }

    public function getKategoriProperty()
    {
        return Kategori::pluck('nama');
    }
}
