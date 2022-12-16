<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\accounts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\user::factory(10)->create();

        // \App\Models\user::factory()->create([
        //     'name' => 'Test user',
        //     'email' => 'test@example.com',
        // ]);

        // Thêm 1 tài khoản admin
        /* accounts::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('88866632664Hieu@'),
            'isAdmin' => true,
        ]);*/

        // Thêm 1 tài khoản bác sĩ (doctor)
        accounts::factory()->create([
            'email' => 'bacsi@gmail.com',
            'password' => Hash::make('88866632664Hieu@'),
            'isDoctor' => true,
            'name' => 'Lê Minh Hiếu',
            'phones' => '0967710509',
            'date_of_births' => '2002-11-09',
            'genders' => 'Nam',
            'address' => 'Hà Nội',
        ]);

    }
}
