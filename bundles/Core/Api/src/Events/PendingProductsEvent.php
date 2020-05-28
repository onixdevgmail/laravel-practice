<?php

namespace Core\Api\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PendingProductsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param $pending_product_count
     */
    public function __construct($pending_product_count)
    {
        $this->message  = "There are {$pending_product_count} products in pending status.";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['pending-products'];
    }
}
