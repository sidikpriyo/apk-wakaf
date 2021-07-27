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
    public $linkTo = 'pengelola/donasi';

    public function __construct()
    {
        if (auth()->user()->role === 'lembaga') {
            $this->beforeTableSlot = 'lembaga.donasi.button';
            $this->linkTo = 'lembaga/donasi';
        }
    }

    public function builder()
    {
        $user = auth()->user();
        return Donasi::query()->when($user->role === 'lembaga', function ($query) use ($user) {
            $query->where('lembaga_id', '=', $user->id);
        });
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo($this->linkTo, 10),

            Column::name('kampanye.nama')->label('Kampanye')->searchable()->defaultSort(),

            Column::name('donatur.name')->label('Donatur'),

            NumberColumn::name('nominal'),

            Column::name('metode.nama')->label('Metode Pembayaran'),

            Column::name('status.nama')->label('Status Pembayaran'),

            DateColumn::name('created_at')->label('Tanggal')
        ];
    }
}
