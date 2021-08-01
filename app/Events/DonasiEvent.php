<?php

namespace App\Events;

use App\Models\Donasi;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DonasiEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $donasi;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Donasi $donasi)
    {
        $this->donasi = $donasi;
    }
}
