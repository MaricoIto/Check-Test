<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contacts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('ja_JP');

        for ($i = 0; $i < 35; $i++) {
            DB::table('contacts')->insert([
                'category_id' => $faker->numberBetween(1, 5),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->numberBetween(1, 3),
                'email' => $faker->unique()->safeEmail,
                'tell' => $faker->numerify('###########'),
                'address' => $faker->prefecture . ' ' . $faker->city . ' ' . $faker->streetAddress,
                'building' => $faker->optional()->secondaryAddress,
                'detail' => $faker->realText(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
