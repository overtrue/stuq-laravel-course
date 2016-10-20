<?php

use Illuminate\Database\Seeder;

use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCategories();
    }

    public function createCategories()
    {
        Category::create([
                'name' => '计算机',
                'slug' => 'id',
            ]);

        Category::create([
                'name' => '科研',
                'slug' => 'tech',
            ]);
        Category::create([
                'name' => '教育',
                'slug' => 'edu',
            ]);
        Category::create([
                'name' => '育儿',
                'slug' => 'children',
            ]);
    }
}
