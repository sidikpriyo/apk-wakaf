<?php

namespace App\Http\Livewire;

use App\Models\Pencairan;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TabelPencairan extends LivewireDatatable
{
    public $exportable = true;
    public $hideable = 'select';
    public $model = Pencairan::class;
    public $beforeTableSlot = '';
    public $linkTo = 'pengelola/pencairan';

    public function __construct()
    {
        switch (auth()->user()->role) {
            case 'lembaga':
                $this->linkTo = 'lembaga/pencairan';
                break;
            default:
                # code...
                break;
        }
    }

    public function builder()
    {
        $user = auth()->user();
        return Pencairan::query()->when($user->role === 'lembaga', function ($query) use ($user) {
            $query->whereHas('kampanye', function ($query) use ($user) {
                $query->where('lembaga_id', '=', $user->id);
            });
        });
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->linkTo($this->linkTo, 10)->filterable(),

            NumberColumn::callback('nominal', function ($nominal) {
                return 'Rp ' . number_format($nominal);
            })->label('Nominal')->filterable(),

            Column::name('kampanye.nama')->label('Kampanye')->searchable()->filterable(),

            Column::name('keterangan')->label('Catatan')->filterable(),

            BooleanColumn::name('completed_at')->label('Selesai')->filterable(),

            DateColumn::name('created_at')->label('Tanggal')->defaultSort()->filterable(),
        ];
    }
}
