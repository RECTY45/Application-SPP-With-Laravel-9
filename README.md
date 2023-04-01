# APLIKASI TRANSAKSI PEMBAYARAN SPP

Aplikasi pembayaran SPP yang saya buat dengan tujuan tugas pemprograman web & mobile sekolah saya [SMK MUTIARA ILMU](https://mutiarailmu.sch.id). Dalam aplikasi ini, admin dapat melihat jumlah tagihan SPP yang harus dibayarkan, melakukan pembayaran SPP dengan mudah dan cepat, serta memperoleh informasi tentang status pembayaran SPP secara real-time. Selain itu, dalam aplikasi ini juga terdapat fitur seperti melihat tunggakan siswa,tunggakan kelas, jumlah pembayaran siswa, jumlah pembayaran kelas serta cetak kwitansi, laporan, dan rekap pembayaran.

Aplikasi pembayaran SPP saya juga dilengkapi dengan fitur laporan pembayaran SPP, yang memungkinkan para admin memantau dan melacak pembayaran SPP yang telah dilakukan. Dalam laporan ini, terdapat informasi detail tentang tanggal pembayaran, jumlah yang dibayarkan, dan status pembayaran. Dengan fitur ini, para siswa dan orang tua dapat dengan mudah mengakses catatan pembayaran SPP mereka dan memastikan bahwa pembayaran SPP telah dilakukan dengan benar. Dalam rangka meningkatkan kualitas layanan.

Follow instagram saya [Muhammad Bintang](https://www.instagram.com/bntg.ch_icy/)

> Aplikasi ini masih dalam tahap pengembangan!

## Screenshot

### Login Page
<img src="![1](https://user-images.githubusercontent.com/68836194/229266334-ebb7d9ab-e4b7-4e7c-94b0-d29cb20039f5.png)" width="800" alt="gambarHomePage">

### Fitur Aplikasi
<img src="https://github.com/M-BintangR/gambar-doc/blob/main/5.gif" alt="gambarHomePage">
<img src="https://github.com/M-BintangR/gambar-doc/blob/main/1.png" width="800" alt="gambarHomePage">
<img src="https://github.com/M-BintangR/gambar-doc/blob/main/2.png" width="800" alt="gambarHomePage">
<img src="https://github.com/M-BintangR/gambar-doc/blob/main/3.png" width="800" alt="gambarHomePage">
<img src="https://github.com/M-BintangR/gambar-doc/blob/main/4.png" width="800" alt="gambarHomePage">

## Teknologi
1. [Laravel 9](https://laravel.com/)
2. [Data Tabel](https://datatables.net/)
3. [Select 2](https://select2.org/)
4. [Bootstrap 5](https://getbootstrap.com/)

## Fitur

1. Sistem login 
2. Multiusers
3. Multiroles
4. Homepage dan Dashboard
5. Manajement Transaksi
6. Cetak Laporan,Kwitansi,Rekap, dan Tunggakan
7. Manajement Siswa, Kelas, Petugas, dan Spp
8. Pelacakan Transaksi Pembayaran
9. ...dll

## Cara Install dan Mengatur Aplikasi

clone repo ini dengan cara :
```bash
https://github.com/RECTY45/app_spp.git
```
Kemudian, buka terminal seperti bash, zsh, command prompt atau powershell dan nstall dependency composer dengan command berikut :
```bash
composer install && composer update
```
Lanjut, copy file `.env.example` dengan nama `.env` sebagai berikut:
```bash
cp .env.example .env
```
Kemudian, silahkan ganti credentials database di file .env nya seperti
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxx
DB_USERNAME=root
DB_PASSWORD=
```
untuk panduan atau dokumentasi mengenai setup database pada file `.env` bisa kalian baca pada dokumentasi resmi laravelnya bang yahh.., [klik disini.](https://laravel.com/docs/9.x/database)

Kemudian, silahkan migrate semua database di project ini dengan menggunakan artisan command:
```bash
php artisan migrate
```
Lanjut, generate aplikasi key untuk keamanan pada project laravel dengan menggunakan artisan command berikut:
```bash
php artisan key:generate
# atau 
php artisan key:generate --show
```
Install dependencies nodejs didalam folder `node_modules` menggunakan Npm atau Yarn:
```bash
npm install && npm run dev
# atau menggunakan Yarn
yarn && yarn dev
# atau menggunakan pnpm
pnpm i && pnpm dev
```
Langkah Terakhir, silahkan jalankan local development server Laravel dengan menggunakan artisan command sebagai berikut:
```bash
php artisan serve
```
Project ini akan berjalan di `https://localhost:8000`.

## Database dan Tabel

### Tabel User
| Nama            |Type      |Length     |Atribut                       |
|-----------------|----------|-----------|------------------------------|
| id              | int      | 11        | primary_key, auto_increment  |
| username        | varchar  | 25        | -                            | 
| nama_pengguna   | varchar  | 35        | -                            |
| level           | enum     | 0         | -                            |
| password        | varchar  | 8         | -                            |

### Tabel Siswa
| Nama      | Type    | Length    | Atribut                             |
|-----------|---------|-----------|-------------------------------------|
| nisn      | int     | 10        | primary_key, auto_increment, unique |
| nis       | char    | 8         | unique                              |
| nama      | varchar | 35        | -                                   |
| jk        | enum    | 0         | -                                   |
| id_kelas  | int     | 11        | -                                   |
| alamat    | text    | 0         | -                                   |
| no_telp   | char    | 13        | -                                   |
| id_spp    | int     | 11        | -                                   |

### Tabel Kelas
| Nama                | Type    | Atribut                     |
|---------------------|---------|-----------------------------|
| id                  | int     | primary_key, auto_increment |
| nama_kelas          | varchar | -                           |
| kompetensi_keahlian | varchar | -                           |

### Tabel SPP
| Nama      | Type    | Length | Atribut                     |
|-----------|---------|--------|-----------------------------|
| id        | int     | 11     | primary_key, auto_increment |
| nominal   | bigint  | 100    |                             |
| level     | enum    | 0      |                             |

### Tabel Pembayaran
| Nama         | Type       | Length  | Atribut                     |
|--------------|------------|---------|-----------------------------|
| id_petugas   | int        | 11      | primary_key, auto_increment |
| nisn         | int        | 10      | -                           |
| tgl_bayar    | date       | 0       | -                           |
| bulan_bayar  | varchar    | 10      | -                           |
| tahun_bayar  | varchar    | 4       | -                           |   
| id_spp       | int        | 11      | -                           |
| jumlah_bayar | bitint     | 100     | -                           |

### Tabel Kuitansi
| Nama          | Type      | Length    | Atribut                       |
|---------------|-----------|-----------|-------------------------------|
| id            | int       | 11        | primary_key, auto_increment   |
| nis           | char      | 8         | -                             |
| bulan         | varchar   | 100       | -                             |
| tanggal       | date      | 0         | -                             |

