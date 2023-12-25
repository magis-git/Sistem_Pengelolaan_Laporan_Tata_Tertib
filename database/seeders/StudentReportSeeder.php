<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentReportSeeder extends Seeder
{
    public function run()
    {
        Student::factory()->count(20)->create();

        
    }
}
