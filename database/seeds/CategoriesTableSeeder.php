<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'           => 'None',
                'description'    => '',
            ],
            [
                'name'        => 'Factory',
                'description' => '',
                'sub_categories' => [
                    [
                        'name'        => 'SMD',
                        'description' => '',
                    ],
                    [
                        'name'        => 'PMD',
                        'description' => '',
                    ],
                    [
                        'name'        => 'Engineering',
                        'description' => '',
                    ],
                ],
            ],
            [
                'name'        => 'Cultivation',
                'description' => '',
            ],
            [
                'name'        => 'Distribution',
                'description' => '',
            ],
            [
                'name'        => 'Travelling',
                'description' => '',
            ],
        ];

        foreach ($categories as $category) {
            $id = DB::table('categories')->insertGetId([
                'name'        => $category['name'],
                'description' => $category['description'],
                'parent_id'   => 0,

            ]);

            if (!empty($category['sub_categories'])) {
                foreach ($category['sub_categories'] as $category) {
                    DB::table('categories')->insert([
                        'name'        => $category['name'],
                        'description' => $category['description'],
                        'parent_id'   => $id,

                    ]);
                }
            }
        }

    }
}
