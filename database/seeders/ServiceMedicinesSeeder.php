<?php

namespace Database\Seeders;

use App\Models\ServiceMedicine;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceMedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceMedicine::factory(50)->create();
    }
}
