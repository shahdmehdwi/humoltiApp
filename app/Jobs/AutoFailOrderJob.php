<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Customer\Order;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AutoFailOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderId;
    /*
     * Create a new job instance
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /* Execute the job.
     */
    public function handle(): void
    {
        $order = Order::find($this->orderId);

        if ($order && $order->status === 'waiting') {
            // If the order is still in the waiting status, mark it as failed
            $order->status = 'failed';
            $order->save();
        }
    }
}
