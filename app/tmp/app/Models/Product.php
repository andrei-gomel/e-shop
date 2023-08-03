<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'code',
        'description',
        'price',
        'quantity',
        'color',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'photo',
        'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *  Получаем категорию продукта
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *  Получить юзера, создавшего продукт
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     *  Получить заказы в которых есть данный товар
     */

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot( 'count');
    }
}
