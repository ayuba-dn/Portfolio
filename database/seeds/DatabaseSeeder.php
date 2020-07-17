<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => bcrypt('password'),
        //     'location' => Str::random(25),
        //     'personal_summary' => Str::random(50),
        //     'surname' => Str::random(10),
        //     'contact' => Str::random(1)
        // ]);

        $this->call(QuestionnairesTableSeeder::class);
       
    }
}
