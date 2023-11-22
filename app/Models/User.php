<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public static $roles = ['Админ', 'Менеджер', 'Покупатель'];
    public static $status = ['Не активен', 'Активен'];

    const ADMIN_ROLE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_id',
        'city',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *  Получить страну для пользователя
     */

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     *  Получить все товары, которые создал юзер
     */

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     *  Получить все заказы пользователя
     */

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_users');
    }

/*
    public function setPasswordAttribute($password)
    {
         //$this->attributes['password'] = Hash::make('password');
    }*/
/*
    public function routeNotificationForMail($notification)
    {
        // Вернуть только адрес электронной почты ...
        return $this->email_address;

        // Вернуть адрес электронной почты и имя ...
        //return [$this->email_address => $this->name];
    }*/
}
