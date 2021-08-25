<?php

namespace App\Http\Livewire;

use App\Models\Riwayat;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelRiwayat extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Riwayat::class;
    public $beforeTableSlot = '';

    public function builder()
    {
        return Riwayat::query()->where('donatur_id', auth()->id());
    }

    public function columns()
    {
        return [
            Column::name('kampanye.nama')->label('Kampanye')->searchable(),

            Column::name('kategori.nama')->label('Kategori'),

            Column::name('lihat')->label('Total Kunjungan'),

            Column::name('user.name')->label('Donatur')->hide(),
        ];
    }
}
