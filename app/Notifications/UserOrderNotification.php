<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class UserOrderNotification extends Notification
{
    use Queueable;

    protected $order_id;
    protected $order_price;
    protected $order_address;
    protected $order_delivery;
    protected $products_name;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, Order $order, $products_name)
    {
        $this->user = $user;
        $this->order_id = $order->id;
        $this->order_price = $order->total_price;
        $this->order_address = $order->address;
        $this->order_delivery = $order->delivery;
        $this->products_name = $products_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->line($this->user->name . ' , Ваш заказ № ' . $this->order_id . ' на сумму ' . $this->order_price . ' рублей оформлен! Вы заказали следующий товар: ' . $this->products_name . '. Адрес доставки: ' . $this->order_address . '. Способ доставки: ' . Order::$delivery[$this->order_delivery])
            ->action('Вернуться в магазин E-shop', url('/'))
            ->line('Спасибо что выбрали наш магазин E-shop!');

        //dd($mail);die();

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
