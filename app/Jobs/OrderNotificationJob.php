<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserOrderNotification;
use App\Models\User;
use App\Models\Order;
//use Illuminate\Notifications\Notification;

class OrderNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    protected $order;
    protected $products_name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, $products_name)
    {
        $this->user = Auth::user();
        $this->order = $order;
        $this->products_name = $products_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new UserOrderNotification($this->user, $this->order, $this->products_name));
    }
}
