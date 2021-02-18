<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ((range(1, 10)) as $index) {
            Profile::create([
                'user_id' => User::inRandomOrder()->value('id')
            ]);
        }
    }
}
