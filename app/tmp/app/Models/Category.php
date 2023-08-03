<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Class BlogCategory
*
* @package App\Models
*
* @property-read Category $parentCategory
* @property-read string       $parentTitle
*/
class Category extends Model
{
    use SoftDeletes;

    /**
    * Id корня
    *
    */
    const ROOT = 1;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
    * Получить родительскую категорию
    *
    * @return Category
    */
    public function parentCategory()
    {
	    return $this->belongsTo(Category::Class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Получаем все товары выбранной категории
     *
     */

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
    *
    * Пример аксесуара (Accessor)
    *
    * @url https://laravel.com/docs/5.8/eloquent-mutators
    *
    * @return string
    */
    public function getParentTitleAttribute()
    {
	    $title = $this->parentCategory->title ?? ($this->isRoot()
		    ? 'Корень'
		    : '???');

	    return $title;
    }

    /**
    *
    * Является ли текущий объект корневым
    *
    * @return bool
    */
    public function isRoot()
    {
	    return $this->id === Category::ROOT;
    }
}
