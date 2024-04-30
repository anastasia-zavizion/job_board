<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employers = Employer::all()->shuffle();
        for ($i=0;$i<100;$i++){
            Job::factory()->create(['employer_id'=>$employers->random()->id]);
        }
    }
}
