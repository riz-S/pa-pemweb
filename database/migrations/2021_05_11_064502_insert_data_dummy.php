<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class InsertDataDummy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            ['userId' => 'rizaS', 'password' => Hash::make('12345678')],
            ['userId' => 'rahgadget', 'password' => Hash::make('12345678')],
            ['userId' => 'syauqi2', 'password' => Hash::make('12345678')],
            ['userId' => 'masharun', 'password' => Hash::make('12345678')],
            ['userId' => 'nathanael', 'password' => Hash::make('12345678')],
            ['userId' => 'walskuyy', 'password' => Hash::make('12345678')],
        ]);
            //gausah disentuh
        DB::table('jabatan')->insert([
            ['nama'=>'Ketua Komunitas'],
            ['nama'=>'Wakil Ketua Komunitas'],
            ['nama'=>'Sekretaris Komunitas'],
            ['nama'=>'Bendahara Komunitas'],
            ['nama'=>'Kepala Divisi'],
            ['nama'=>'Staff Divisi'],
            ['nama'=>'Anggota']
        ]);
            //harus sama dengan anggota
        DB::table('dataDiri')->insert([
            ['email' => 'rizaS@gmail.com', 'nama' => 'Riza Setiawan S', 'fakultas' => 'FILKOM', 
            'noTelp' => '0813333333', 'jenisKelamin' => 'Laki-laki', 'domisili' => 'Makassar','foto'=>'default.png',
            'ig'=>'riz.stwn','wa'=>'0813333333','linkedin'=>'riz_stwn','line'=>'rizas23', 'userId' => 'rizaS'],
            ['email' => 'rahgadget@gmail.com', 'nama' => 'Rah Gadget', 'fakultas' => 'FIA', 
            'noTelp' => '08123456789', 'jenisKelamin' => 'Perempuan', 'domisili' => 'Bali', 'foto'=>'default.png',
            'ig'=>'rahgadget','wa'=>'08123456789','linkedin'=>'rah-gadget','line'=>'rahgadget', 'userId' => 'rahgadget'],
            ['email' => 'syauqi@gmail.com', 'nama' => 'Syauqi Nirwan', 'fakultas' => 'FK', 
            'noTelp' => '089876543211', 'jenisKelamin' => 'Laki-laki', 'domisili' => 'Bandung', 'foto'=>'default.png',
            'ig'=>'syauqi','wa'=>'089876543211','linkedin'=>'syauqi','line'=>'syauqi', 'userId' => 'syauqi2'],
            ['email' => 'harun@gmail.com', 'nama' => 'Mas Harun', 'fakultas' => 'FEB', 
            'noTelp' => '089876543210', 'jenisKelamin' => 'Laki-laki', 'domisili' => 'Malang', 'foto'=>'default.png',
            'ig'=>'MasHarun','wa'=>'089876543210','linkedin'=>'Mas-Harun','line'=>'MasHarun', 'userId' => 'masharun'],
            ['email' => 'nathanaeln@gmail.com', 'nama' => 'nathanael victor', 'fakultas' => 'FILKOM', 
            'noTelp' => '089876543290', 'jenisKelamin' => 'Laki-laki', 'domisili' => 'Malang', 'foto'=>'default.png',
            'ig'=>'nathanael','wa'=>'089876543290','linkedin'=>'nathanael','line'=>'nathanael', 'userId' => 'nathanael'],
            ['email' => 'walskuyyn@gmail.com', 'nama' => 'Wale Noob', 'fakultas' => 'FILKOM', 
            'noTelp' => '089876543280', 'jenisKelamin' => 'Laki-laki', 'domisili' => 'Malang', 'foto'=>'default.png',
            'ig'=>'walskuyy','wa'=>'089876543280','linkedin'=>'walskuyy','line'=>'walskuyy', 'userId' => 'walskuyy']
        ]);
        
        DB::table('komunitas')->insert([
            ['nama' => 'Basic Computing Community', 'alamat'=> 'Gedung C2.3 FILKOM UB','jenis'=>'Komunitas', 'logo' => 'logo-BCC.png','deskripsi'=>'Komunitas ngoding',
            'email'=>'bccfilkom@gmail.com','line'=>'bccfilkom','ig'=>'bccfilkomub'],
            ['nama' => 'BEM FILKOM', 'alamat'=> 'Gedung C1.1 FILKOM UB','jenis'=>'LO', 'logo' => 'logo-BEM.png','deskripsi'=>'LO yang berada diatas semua LSO',
            'email'=>'bemfilkom@gmail.com','line'=>'bemfilkom','ig'=>'bemfilkomub'],
            ['nama' => 'DPM FILKOM', 'alamat'=> 'Gedung C1.3 FILKOM UB','jenis'=>'LO', 'logo' => 'default.png','deskripsi'=>'LO yang menjadi pasangan BEM',
            'email'=>'dpmfilkom@gmail.com','line'=>'dpmfilkom','ig'=>'dpmfilkomub'],
            ['nama' => 'K-RISMA', 'alamat'=> 'Gedung C1.4 FILKOM UB','jenis'=>'LSO', 'logo' => 'default.png','deskripsi'=>'LSO yang menaungi riset mahasiswa',
            'email'=>'krismafilkom@gmail.com','line'=>'krismafilkom','ig'=>'krismafilkomub'],
            ['nama' => 'RAION', 'alamat'=> 'Gedung C1.4 FILKOM UB','jenis'=>'LSO', 'logo' => 'default.png','deskripsi'=>'LSO yang menaungi minat mahasiswa untuk membuat game',
            'email'=>'RAIONfilkom@gmail.com','line'=>'RAIONfilkom','ig'=>'RAIONfilkomub'],
            ['nama' => 'AyoDev', 'alamat'=> 'Gedung C1.4 FILKOM UB','jenis'=>'Komunitas', 'logo' => 'default.png','deskripsi'=>'LSO yang menaungi minat mahasiswa untuk membuat game',
            'email'=>'AyoDevfilkom@gmail.com','line'=>'AyoDevfilkom','ig'=>'AyoDevfilkomub'],
        ]);
            //harus sama dengan datadiri
        DB::table('anggota')->insert([
            ['anggotaId'=>'BCC-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 1, 'userId' => 'rizaS' , 'dataDiriId'=> 1],
            ['anggotaId'=>'BEM-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 2, 'userId' => 'rahgadget', 'dataDiriId'=> 2 ],
            ['anggotaId'=>'DPM-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 3, 'userId' => 'syauqi2', 'dataDiriId'=> 3 ],
            ['anggotaId'=>'RAION-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 5, 'userId' => 'masharun', 'dataDiriId'=> 4 ],
            ['anggotaId'=>'AyoDev-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 6, 'userId' => 'nathanael', 'dataDiriId'=> 5 ],
            ['anggotaId'=>'KRISMA-1', 'jabatanId' => 1,'statusacc'=>1, 'komunitasId' => 4, 'userId' => 'walskuyy', 'dataDiriId'=> 6 ]

        ]);


            //harus sama seperti komunitas
        DB::table('komunitas')->where('komunitasId',1)->update(['ketuaId'=>'BCC-1']);
        DB::table('komunitas')->where('komunitasId',2)->update(['ketuaId'=>'BEM-1']);
        DB::table('komunitas')->where('komunitasId',3)->update(['ketuaId'=>'DPM-1']);
        DB::table('komunitas')->where('komunitasId',4)->update(['ketuaId'=>'KRISMA-1']);
        DB::table('komunitas')->where('komunitasId',5)->update(['ketuaId'=>'RAION-1']);
        DB::table('komunitas')->where('komunitasId',6)->update(['ketuaId'=>'AyoDev-1']);
        
        DB::table('divisi')->insert([
            ['divisiId' => 'DivisiBCC-1','nama' => 'Danus', 'komunitasId' => 1, 'ketuaId' => 'BCC-1', 'deskripsi' => 'Divisi yang bertugas menghasilkan uang'],
            ['divisiId' => 'DivisiBEM-1','nama' => 'PIT', 'komunitasId' => 2, 'ketuaId' => 'BEM-1', 'deskripsi' => 'Divisi yang bertugas mengurus website'],
            ['divisiId' => 'DivisiBEM-2','nama' => 'PSDM', 'komunitasId' => 2, 'ketuaId' => 'BEM-1', 'deskripsi' => 'Divisi yang bertugas mengurus sumberdaya mahasiswa'],
            ['divisiId' => 'DivisiBEM-3','nama' => 'Kastrat', 'komunitasId' => 2, 'ketuaId' => 'BEM-1', 'deskripsi' => 'Divisi yang bertugas mengurus pergerakan dan propaganda mahasiswa'],
            ['divisiId' => 'DivisiDPM-1','nama' => 'Aspirasi', 'komunitasId' => 3, 'ketuaId' => 'DPM-1', 'deskripsi' => 'Divisi yang bertugas mengurus dan menyimpan suara mahasiswa'],
            ['divisiId' => 'DivisiKRISMA-1','nama' => 'Ristek', 'komunitasId' => 4, 'ketuaId' => 'KRISMA-1', 'deskripsi' => 'Divisi yang bertugas mengurus riset tentang teknologi'],
            ['divisiId' => 'DivisiRAION-1','nama' => 'UI/UX', 'komunitasId' => 5, 'ketuaId' => 'RAION-1', 'deskripsi' => 'Divisi yang bertugas mengurus User Interface dan User Experience'],
            ['divisiId' => 'DivisiAyoDev-1','nama' => 'Android Developer', 'komunitasId' => 6, 'ketuaId' => 'AyoDev-1', 'deskripsi' => 'Divisi yang bertugas mengurus kodingan tentang mobile android']
            
        ]);
        
        DB::table('proker')->insert([
            ['prokerId' => 'ProkerBCC-1', 'nama' => 'Klinik Koding', 'tglProker' => '2021-08-11', 'deskripsi' => 'Program kerja mengajar mahasiswa sebelum UTS/UAS' , 'komunitasId' => 1 ],
            ['prokerId' => 'ProkerBEM-1','nama' => 'Hology', 'tglProker' => '2021-06-11', 'deskripsi' => 'Program kerja lomba tahunan mahasiswa bertingkat nasional' , 'komunitasId' => 2 ],
            ['prokerId' => 'ProkerBEM-2','nama' => 'PK2 & Startup Academy', 'tglProker' => '2021-08-31', 'deskripsi' => 'Program kerja untuk Probinmaba Filkom' , 'komunitasId' => 2 ],
            ['prokerId' => 'ProkerDPM-1','nama' => 'Sekolah Legislatif', 'tglProker' => '2021-11-1', 'deskripsi' => 'Program kerja untuk mengajak mahasiswa lebih tahu tentang legislatif di filkom' , 'komunitasId' => 3 ],
            ['prokerId' => 'ProkerDPM-2','nama' => 'Monitoring', 'tglProker' => '2021-08-31', 'deskripsi' => 'Program kerja untuk memonitor kinerja BEM' , 'komunitasId' => 3 ],
            ['prokerId' => 'ProkerKRISMA-1','nama' => 'RSKUY', 'tglProker' => '2021-08-31', 'deskripsi' => 'Program kerja untuk mengajak mahasiswa melakukan riset' , 'komunitasId' => 4 ],
            ['prokerId' => 'ProkerRAION-1','nama' => 'NgegameUY', 'tglProker' => '2021-08-31', 'deskripsi' => 'Program kerja untuk mengajakn dan memberi informasi tentang games' , 'komunitasId' => 5 ],
            ['prokerId' => 'ProkerAyoDev-1','nama' => 'Kodingding', 'tglProker' => '2021-08-31', 'deskripsi' => 'Program kerja untuk memberi pelajaran tentang koding' , 'komunitasId' => 6 ],
        ]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
