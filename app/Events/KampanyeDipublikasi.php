<?php

namespace App\Events;

use App\Models\Kampanye;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class KampanyeDipublikasi
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $kampanye;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Kampanye $kampanye)
    {
        $this->kampanye = $kampanye;
    }
}
