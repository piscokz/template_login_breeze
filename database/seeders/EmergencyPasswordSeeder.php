<?php

namespace Database\Seeders;

use App\Models\EmergencyPassword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $emergency_passwords = [
        //     ['emergency_password' => 'SUPER4060$1000;VS{StallerJade};']
        // ];

        // foreach($emergency_passwords as $emergency_password => $val) {
        //     EmergencyPassword::create($val);
        // }

        EmergencyPassword::create([
        'emergency_password' => 'SUPER4060$1000;VS{StallerJade};'
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'level' => $request->level,
        // ]);
    }
}
