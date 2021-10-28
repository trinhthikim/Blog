<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake  = Faker\Factory::create();
        $limit = 15;

        for ($i = 0; $i < $limit; $i++){
            DB::table('posts')->insert([
                'title' => $fake->name,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'user_id' => $fake->numberBetween($min = 1, $max = 4),
                'content' => $fake->sentence(500),
                'user_name' => $fake->name,
            ]);
        }
    }
}
