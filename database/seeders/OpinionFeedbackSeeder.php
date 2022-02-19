<?php

namespace Database\Seeders;

use App\Models\Opinion;
use App\Models\OpinionFeedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class OpinionFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i<50; $i++) {
            DB::insert('insert into user_opinion (user_id, opinion_id, comment, points) values (?, ?, ?, ?)', [
                User::all()->random()->id,
                Opinion::all()->random()->id,
                $faker->text(60),
                $faker->randomElement([-1, -1, 0, 0, 0, 1, 1, 1, 1])
            ]);
        }
    }
}
