<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Admin::create([
            'id_admin' => 1,
            'nama_admin' => 'Titin Suhartini',
            'username' => 'admin',
            'email' => 'titinsuhartini@gmail.com',
            'password' => bcrypt('admin')
        ]);
        \App\Models\Admin::create([
                'id_admin' => 2,
                'nama_admin' => 'Munaroh',
                'username' => 'bendahara',
                'email' => 'munaroh21@gmail.com',
                'password' => bcrypt('Bendahara1')
        ]);
    }
}