<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'name' => 'Pindad Hospital',
            'address' => 'Jl. Pindad 1, Bandung',
            'email' => 'hospitalpindad@gmail.com',
            'phone' => '081234123421',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Hospital::create([
            'name' => 'Hermina Hospital',
            'address' => 'Jl. Hermina 1, Bandung',
            'email' => 'hospitalhermina@gmail.com',
            'phone' => '081234123421',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
