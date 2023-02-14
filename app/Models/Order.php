<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\OrderCreateNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    public static $status = ['Новый', 'В обработке', 'Доставляется', 'Закрыт'];
    public static $delivery = [
                        '1' => 'Самовывоз',
                        '2' => 'Курьером',
                        '3' => 'Почтой',
                ];

    protected $fillable = [
        'user_id',
        'comment',
        'total_price',
        'delivery',
        'manager_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'address',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *  Получить пользователя который создал заказ
     */

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     *  Получить продукты в заказе
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
        ->withPivot( 'count');
    }
/*
    public function routeNotificationForMail($notification)
    {
        // Вернуть только адрес электронной почты ...
        return $this->email_address = Auth::user()->email;

        // Вернуть адрес электронной почты и имя ...
        //return [$this->email_address => $this->name];
    }*/
}
