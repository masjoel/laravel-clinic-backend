<?php

namespace Database\Seeders;

use App\Models\PatientSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientSchedule::factory(20)->create();
    }
}
