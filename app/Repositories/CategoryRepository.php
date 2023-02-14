<?php

namespace App\Repositories;

use App\Models\Category as Model;
use Illuminate\Database\Eloqument\Collection;

/**
* Class CategoryRepository
*
* @package App\Repositories
*/

Class CategoryRepository extends CoreRepository
{
	/**
	* @return string
	*/

	protected function GetModelClass()
	{
		return Model::Class;
	}
	/**
	* Получить модель для редактирования в админке
	* @param int $id
	*
	* return Model
	*/
	public function getEdit($id)
	{
		//dd($this->startConditions()->find($id));
		return $this->startConditions()->find($id);
	}

	/**
	* Получить список категорий для вывода в выпадающем списке
	*
	* return Collection
	*/

	public function getForComboBox()
	{
		//return $this->startConditions()->all();

    $columns = implode(',', ['id', 'CONCAT (id, ". ", title) AS id_title',]);

		/*$result[] = $this->startConditions()->all();

		$result[] = $this
            ->startConditions()
            ->select('blog_categories.*',
            \DB::raw('CONCAT (id, ". ", title) AS id_title'))
            ->toBase()
            ->get();*/

		$result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

		//dd($result->first());
		return $result;
	}

	/**
     * Получить категории для вывода пагинатором
     *
     * @param int|null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

	public function getAllWithPaginate(int $perPage = null)
    {
        $columns = ['id', 'title', 'parent_id', 'slug', 'created_at', 'updated_at'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with(['parentCategory:id,title',])
            ->paginate($perPage);

        return $result;
    }
}
