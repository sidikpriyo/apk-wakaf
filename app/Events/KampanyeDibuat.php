<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KampanyeDibuat
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $kampanye;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($kampanye)
    {
        $this->kampanye = $kampanye;
    }
}
