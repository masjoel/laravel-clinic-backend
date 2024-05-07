<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DoctorSchedule::create([
            'doctor_id' => 1,
            'day' => 'Monday',
            'time' => '08:00 - 12:00'
        ]);

        Doctor::all()->each(function ($doctor) {
            DoctorSchedule::factory()->count(1)->create([
                'doctor_id' => $doctor->id
            ]);
        });
    }
}
