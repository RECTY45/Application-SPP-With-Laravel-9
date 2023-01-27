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
                'alamat' => "Jl.Pajjaiang",
                'no_telp' => '09328388',
                'id_spp' => 1
            ],
            [
                'nisn' => '123456440',
                'nis' => '202-002',
                'nama' => 'Zhaka',
                'id_kelas' => 2,
                'alamat' => "Jl.Pajjaiang",
                'no_telp' => '09328380',
                'id_spp' => 2
            ]
            ];

    $pembayaran = [
                    [
                    'id_petugas' => 1,
                    'nisn' => '1234567890',
                    'tgl_bayar' => "2022-08-02",
                    'bulan_dibayar' => '08',
                    'tahun_dibayar' => '2022',
                    'id_spp' => 1,
                    'jumlah_bayar' => 200000
                    ],
                    [
                    'id_petugas' => 2,
                    'nisn' => '123456440',
                    'tgl_bayar' => "2023-09-07",
                    'bulan_dibayar' => '09',
                    'tahun_dibayar' => '2023',
                    'id_spp' => 2,
                    'jumlah_bayar' => 300000
                    ]

           ];

           $spps  = [
                [
                    'tahun' => '2022',
                    'nominal' => 200000,
                ],
                [
                    'tahun' => '2023',
                    'nominal' => 300000,
                ]
           ];


           $kelas = [
                [
                    'nama_kelas' => "RPL2",
                    'kompetensi_keahlian' => "Teknik Informatika"
                ],
                [
                    'nama_kelas' => "TKJ1",
                    'kompetensi_keahlian' => "Teknik Komputer Dan Jaringan"
                ]
           ];
foreach ($petugas as $user) {
    User::create($user);
}
foreach ($siswas as $siswa) {
    Siswa::create($siswa);
}
foreach ($pembayaran as $bayar) {
    Pembayaran::create($bayar);
}
foreach ($spps as $spp) {
    Spp::create($spp);
}
foreach ($kelas as $kelas) {
    Kelas::create($kelas);
}

    }


}
