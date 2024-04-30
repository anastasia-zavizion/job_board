<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=>'Nastya',
            'email'=>'nastya@gmail.com'
        ]);

        User::factory(100)->create();

        $users = User::all()->shuffle();

        for ($i=0;$i<20;$i++){
            Employer::factory()->create(['user_id'=>$users->pop()->id]);
        }

        $this->call([JobSeeder::class]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
