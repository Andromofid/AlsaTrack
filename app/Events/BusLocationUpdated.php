<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BusLocationUpdated implements ShouldBroadcastNow // ✅ Now it broadcasts instantly
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bus_id;
    public $longitude;
    public $latitude;

    public function __construct($bus_id, $latitude, $longitude)
    {
        $this->bus_id = $bus_id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    // ✅ Make sure this matches the channel in JavaScript
    public function broadcastOn()
    {
        return new Channel('channel'.$this->bus_id); // ✅ Corrected the channel name
    }

    // ✅ The event name that JavaScript listens to
    public function broadcastAs()
    {
        return 'event'; // ✅ Must match JavaScript listener
    }
}
