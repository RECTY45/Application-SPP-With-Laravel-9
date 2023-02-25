<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Spp;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $petugas = [
            [
                'username' => 'admin',
                'password' => bcrypt('adminadmin'),
                'nama_petugas' => 'Bintang',
                'level' => 'admin'
            ],
            [
                'username' => 'petugas',
                'password' => bcrypt('petugaspetugas'),
                'nama_petugas' => 'Zhaka',
                'level' => 'petugas'
            ],
];

        $siswas = [
            [
                'nisn' => '1234567890',
                'nis' => '202-001',
                'nama' => 'Bintang',
                'id_kelas' => 1,
                'jenis_kelamin' => 'L',
                'alamat' => "Jl.Pajjaiang",
                'no_telp' => '09328388',
                'id_spp' => 1
            ],
            [
                'nisn' => '123456440',
                'nis' => '202-002',
                'nama' => 'Zhaka',
                'id_kelas' => 2,
                'jenis_kelamin' => 'L',
                'alamat' => "Jl.Pajjaiang",
                'no_telp' => '09328380',
                'id_spp' => 2
            ],
            ];

    // $pembayaran = [
    //                 [
    //                 'id_petugas' => 2,
    //                 'nisn' => '123456440',
    //                 'tgl_bayar' => "2023-09-07",
    //                 'bulan_dibayar' => '',
    //                 'tahun_dibayar' => '2023',
    //                 'id_spp' => 2,
    //                 'jumlah_bayar' => 300000
    //                 ],

    //        ];

           $data_spp = [
            [
                "tahun" => 2019,
                "nominal" => 170000,
            ],
            [
                "tahun" => 2020,
                "nominal" => 200000,
            ],
            [
                "tahun" => 2021,
                "nominal" => 250000,
            ],
            [
                "tahun" => 2022,
                "nominal" => 270000,
            ],
            [
                "tahun" => 2023,
                "nominal" => 300000,
            ],
        ];



        $data_kelas = [
            [
                "nama_kelas" => "3 RPL 2",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "2 RPL 2",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "1 RPL 2",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "3 RPL 1",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "2 RPL 1",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "1 RPL 1",
                "kompetensi_keahlian" => "Rekayasa Prangkat Lunak",
            ],
            [
                "nama_kelas" => "3 TKJ 1",
                "kompetensi_keahlian" => "Teknik Komputer Jaringan",
            ],
            [
                "nama_kelas" => "2 TKJ 1",
                "kompetensi_keahlian" => "Teknik Komputer Jaringan",
            ],
            [
                "nama_kelas" => "1 TKJ 1",
                "kompetensi_keahlian" => "Teknik Komputer Jaringan",
            ],
            [
                "nama_kelas" => "3 MMD 1",
                "kompetensi_keahlian" => "Multi Media",
            ],
            [
                "nama_kelas" => "2 MMD 1",
                "kompetensi_keahlian" => "Multi Media",
            ],
            [
                "nama_kelas" => "1 MMD 1",
                "kompetensi_keahlian" => "Multi Media",
            ],
        ];

foreach ($petugas as $user) {
    User::create($user);
}
foreach ($siswas as $siswa) {
    Siswa::create($siswa);
}
Siswa::factory()->count(10)->create();
User::factory()->count(10)->create();
// foreach ($pembayaran as $bayar) {
//     Pembayaran::create($bayar);
// }
foreach ($data_spp as $spp) {
    Spp::create($spp);
}
foreach ($data_kelas as $kelas) {
    Kelas::create($kelas);
}

    }


}
