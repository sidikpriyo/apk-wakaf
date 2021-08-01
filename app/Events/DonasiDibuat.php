<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DonasiDibuat
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $donasi;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($donasi)
    {
        $this->donasi = $donasi;
    }
}
