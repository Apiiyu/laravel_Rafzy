<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'hospital_id' => 1,
            'name' => 'John Doe',
            'address' => 'Jl. Pindad 1, Bandung',
            'phone' => '081234123421',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Patient::create([
            'hospital_id' => 2,
            'name' => 'Jane Doe',
            'address' => 'Jl. Hermina 1, Bandung',
            'phone' => '081234123421',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
