<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the models blog category "creating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     *  Метод заполнения поля slug если оно пустое
     *
     * @param Category $category
     */
    protected function setSlug(Category $category)
    {
        if(empty($category->slug))
        $category->slug = Str::slug($category->title);
    }

    /**
     * Handle the models blog category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the models blog category "updating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        //dd(__METHOD__, $category->isDirty());
        $this->setSlug($category);
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
