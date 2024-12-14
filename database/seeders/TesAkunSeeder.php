<?php

namespace Database\Seeders;

use App\Models\EmergencyPassword;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TesAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'The Creator',
                'email' => 'iteens.tefa@gmail.com',
                'level' => 'engineer',
                'password' => bcrypt('yaHayyukPalpale666VS{RTX9090SUPER};')
            ],
            [
                'name' => 'The Admin',
                'email' => 'seninselasarabukamis84@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('asu12345')
            ],
            [
                'name' => 'Stake holder',
                'email' => 'faryiedkarawang@gmail.com',
                'level' => 'bendahara',
                'password' => bcrypt('asu12345')
            ],
            [
                'name' => 'Kasir alfa',
                'email' => 'fariyd001@gmail.com',
                'level' => 'kasir',
                'password' => bcrypt('asu12345')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
