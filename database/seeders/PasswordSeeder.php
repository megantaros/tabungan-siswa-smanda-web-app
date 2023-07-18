<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = Siswa::find(10);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(11);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(12);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(13);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(14);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(15);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(16);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(17);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(18);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(19);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(21);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(22);
        $data->update([
            'password' => bcrypt('siswa')
        ]);
        $data = Siswa::find(23);
        $data->update([
            'password' => bcrypt('siswa')
        ]);

    }
}