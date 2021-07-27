<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelLembaga extends LivewireDatatable
{

    public $exportable = true;
    public $hideable = 'select';
    public $model = User::class;
    public $beforeTableSlot = 'pengelola.lembaga.button';

    public function builder()
    {
        return User::query()->lembaga();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo('pengelola/lembaga', 10)
                ->filterable(),

            Column::name('name')
                ->defaultSort()
                ->searchable()
                ->editable()
                ->filterable(),

            Column::name('email')
                ->filterable(),

            BooleanColumn::name('email_verified_at')
                ->label('Verifikasi')
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Tanggal')
                ->filterable(),
        ];
    }
}
