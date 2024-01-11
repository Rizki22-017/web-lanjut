<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Pegawai Tetap',
                'keterangan' => 'Pegawai Tetap Perusahaan'
            ],
            [
                'nama_kategori' => 'Pegawai Kontrak',
                'keterangan' => 'Pegawai Kontrak Perusahaan'
            ],
            [
                'nama_kategori' => 'Pegawai Magang',
                'keterangan' => 'Pegawai Magang Perusahaan'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
