<?php

namespace App\Providers;

use App\Events\DonasiEvent;
use App\Events\KampanyeDibuat;
use App\Events\KampanyeDipublikasi;
use App\Listeners\CatatRiwayatDonasi;
use App\Listeners\KirimNotifikasiDonatur;
use App\Listeners\KirimNotifikasiLembaga;
use App\Listeners\KirimNotifikasiPengelola;
use App\Listeners\PeriksaStatusPembayaran;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DonasiEvent::class => [
            CatatRiwayatDonasi::class,
            PeriksaStatusPembayaran::class,
            KirimNotifikasiDonatur::class,
        ],
        KampanyeDibuat::class => [
            KirimNotifikasiPengelola::class
        ],
        KampanyeDipublikasi::class => [
            KirimNotifikasiLembaga::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
