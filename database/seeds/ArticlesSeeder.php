<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article();
        $article->truncate();
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $index) {
            $article->create([
                'title'=> $faker->text(20),
                'short_text'=> $faker->text(500),
                'full_text'=> $faker->text(20000),
            ]);
        }
    }
}