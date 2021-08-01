<?php

namespace App\Http\Livewire;

use App\Charts\DonaturChart;
use App\Models\Donasi;
use Livewire\Component;

class DashboardPengelola extends Component
{
    public function render()
    {
        $donasi = Donasi::selectRaw('DATE(created_at) as tanggal, SUM(nominal) as nominal, COUNT(*) as total')->lunas()->groupBy('tanggal')->get()->toArray();

        $donaturChart = new DonaturChart;
        $donaturChart->labels(array_column($donasi, 'tanggal'));
        $donaturChart->dataset('Total', 'line', array_column($donasi, 'total'))->color("#C733FF")->backgroundcolor("#C733FF")->fill(false);
        $donaturChart->dataset('Nominal', 'line', array_column($donasi, 'nominal'))->color("#2563eb")->backgroundcolor("#2563eb")->fill(false);

        return view('livewire.dashboard-pengelola')->with([
            'donaturChart' => $donaturChart
        ]);
    }
}
