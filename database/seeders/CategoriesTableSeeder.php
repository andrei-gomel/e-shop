<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

		$cName = "Без категории";

		$categories[] = [
			'title' => $cName,
			'slug' => Str::slug($cName),
			'parent_id' => 0
		];

		for($i = 2; $i<=11; $i++){

			$cName = "Категория №".$i;
			$parent_id = ($i>4) ? rand(1,7) : 1;

			$categories[] = [
				'title' => $cName,
				'slug' => Str::slug($cName),
				'parent_id' => $parent_id,
			];
    }
    DB::table('categories')->insert($categories);
}
}
