<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees =  [
            [
                'id' => '1009',
                'nama' => 'RIZKI',
                'nip' => 112345,
                'ttl' => 'Jambi, 30 Juni 2002',
                'category_id' => 1,
                'jabatan' => 'Teknisi',
                'pendidikan' => 'D3 Teknik Komputer',
                'prestasi' => 'Pegawai Terbaik',
                'foto_sampul' => 'rizki.jpg',
            ],
            [
                'id' => '1112',
                'nama' => 'NAUFAL ELVANDO',
                'nip' => 122345,
                'ttl' => 'Pekanbaru, 1 Juli 2001',
                'category_id' => 2,
                'jabatan' => 'Teknisi',
                'pendidikan' => 'D3 Teknik Komputer',
                'prestasi' => 'Pegawai Terfavorit',
                'foto_sampul' => 'rizki.jpg',
            ],
            [
                'id' => '1113',
                'nama' => 'TOMMY BASRIL',
                'nip' => 132345,
                'ttl' => 'Batam, 2 Agustus 2002',
                'category_id' => 3,
                'jabatan' => 'Teknisi',
                'pendidikan' => 'D3 Teknik Komputer',
                'prestasi' => 'Pegawai Teraktif',
                'foto_sampul' => 'rizki.jpg',
            ],
            [
                'id' => '3113',
                'nama' => 'MOMO',
                'nip' => 123456,
                'ttl' => 'Padang, 3 Agustus 2002',
                'category_id' => 1,
                'jabatan' => 'Teknisi',
                'pendidikan' => 'D3 Teknik Komputer',
                'prestasi' => 'Pegawai Terkece',
                'foto_sampul' => 'rizki.jpg',
            ],
        ];
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
