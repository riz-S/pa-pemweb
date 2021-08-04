<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Anggota;
use App\Models\DataDiri;
use App\Models\Divisi;
use App\Models\Komunitas;
use App\Models\Proker;
use App\Models\User;
use App\Models\Jabatan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Create & Update Anggota
    public function upsertAnggota($anggotaId,$jabatan,$komunitasId,$status,$divisiId,$dataDiriId,$userId,$desc){
        Anggota::updateOrInsert(['anggotaId'=>$anggotaId],
                ['anggotaId' => $anggotaId, 
                'jabatanId' => $jabatan, 
                'komunitasId' => $komunitasId,
                'statusacc'=>$status,
                'divisiId' => $divisiId,
                'dataDiriId' => $dataDiriId,
                'deskripsi'=>$desc,
                'userId' => $userId]
        );
    }

    //Create & Update Divisi
    public function upsertDivisi($divisiId,$nama,$komunitasId,$ketuaId,$desc,$logo){
        Divisi::updateOrInsert(['divisiId'=>$divisiId],
                [ 'nama'=>$nama,
                'komunitasId'=>$komunitasId,
                'ketuaId' => $ketuaId,
                'deskripsi' => $desc,
                'logo'=>$logo]
        );
    }

    //Create Data Diri
    public function insertDataDiri($email,$nama,$fakultas,$noTelp,$jenisK,$domisili,$foto,$ig,$wa,$linked,$line,$userId){
        $dataDiriId = DataDiri::insertGetId(
                ['email' => $email, 
                'nama' => $nama, 
                'fakultas' => $fakultas,
                'noTelp' => $noTelp,
                'jenisKelamin' => $jenisK,
                'domisili' => $domisili,
                'foto' => $foto,
                'ig' => $ig,
                'wa' => $wa,
                'linkedin'=> $linked,
                'line' =>$line,
                'userId' => $userId]
        );
        return $dataDiriId;
    }

    //Create Komunitas
    public function insertKomunitas($nama,$alamat,$jenis,$desc,$logo,$email,$line,$ig,$ytb){
        $komunitasId = Komunitas::insertGetId(
            ['nama' => $nama, 
            'alamat' => $alamat,
            'jenis'=>$jenis, 
            'logo' => $logo,
            'deskripsi' => $desc,
            'email'=>$email,
            'line'=>$line,
            'ig'=>$ig,
            'youtube'=>$ytb]
        );
        return $komunitasId;
    }

    //Create & Update Proker
    public function upsertProker($prokerId,$nama,$tglProker,$komunitasId,$logo,$divisiId,$desc){
        Proker::updateOrInsert(['prokerId'=>$prokerId],
        ['nama' => $nama,
        'tglProker' => $tglProker, 
        'komunitasId' => $komunitasId,
        'logo'=>$logo,
        'divisiId' => $divisiId,
        'deskripsi' => $desc]
        );
    }

    //Create & Update User
    public function upsertUser($userId,$password){
        User::updateOrInsert(['userId'=>$userId],
        ['password'=>$password]
        );
    }

    //Insert image filename to database
    public function insertImage($tempname,$filename,$dest){
        move_uploaded_file($tempname,$dest.$filename);
    }

    //Generate id anggota
    public function generateAnggotaId($komunitasId){
        $namaKom = Komunitas::where('komunitasId',$komunitasId)->value('nama');
        $countAnggota = (Anggota::where('komunitasId',$komunitasId)->value('anggotaId'))?explode("-",Anggota::where('komunitasId',$komunitasId)->pluck('anggotaId')->last())[1]:0;
        $anggotaId = str_replace(' ','',$namaKom).'-'.($countAnggota+1);
        
        return $anggotaId;
    }

    //Generate id proker
    public function generateProkerId($komunitasId){
        $namaKom = Komunitas::where('komunitasId',$komunitasId)->value('nama');
        $countProker = (Proker::where('komunitasId',$komunitasId)->value('prokerId'))?explode("-",Proker::where('komunitasId',$komunitasId)->pluck('prokerId')->last())[1]:0; 
        $prokerId = 'Proker'.str_replace(' ','',$namaKom).'-'.($countProker+1);

        return $prokerId;
    }

    //Generate id divisi
    public function generateDivisiId($komunitasId){
        $namaKom = Komunitas::where('komunitasId',$komunitasId)->value('nama');
        $countDivisi = (Divisi::where('komunitasId',$komunitasId)->value('divisiId'))?explode("-",Divisi::where('komunitasId',$komunitasId)->pluck('divisiId')->last())[1]:0; 
        $divisiId = 'Divisi'.str_replace(' ','',$namaKom).'-'.($countDivisi+1);

        return $divisiId;
    }
}
