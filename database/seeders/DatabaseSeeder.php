<?php

namespace Database\Seeders;

use App\Models\DoctorSchedule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProfileClinic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ProfileClinic::create([
            'name' => 'Klinik Sehat',
            'address' => 'Jl. Raya No. 1',
            'phone' => '1234567890',
            'email' => 'dr.abdullah@masjoel.com',
            'doctor_name' => 'Dr. Abdullah',
            'unique_code' => '123456',
        ]);

        $this->call([
            UserSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            DoctorScheduleSeeder::class,
            ServiceMedicinesSeeder::class,
            PatientScheduleSeeder::class,
        ]);
    }
}
