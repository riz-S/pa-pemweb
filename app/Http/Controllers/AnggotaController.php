<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anggota;
use App\Models\DataDiri;
use App\Models\Divisi;
use App\Models\Komunitas;
use App\Models\Proker;
use App\Models\User;
use App\Models\Jabatan;

class AnggotaController extends Controller
{
//Anggota atau user
    //Load halaman login setelah terkick
    public function kicked(){
        return redirect()->route('login')->with('terkick','Anda harus login terlebih dahulu');
    }

    //Delete akun
    public function deleteAkun($userId){
        if(Anggota::where('userId',$userId)->pluck('jabatanId')->contains(1)){
            return redirect()->route('profil.anggota')->with('gagal','Anda masih menjadi ketua suatu organisasi');
        }
        DataDiri::where('userId',$userId)->update(['userId'=>NULL]);
        Anggota::where('userId',$userId)->update(['userId'=>NULL]);
        User::where('userId',$userId)->delete();
        return redirect()->route('logout');
    }

    //Load halaman utama/cari komunitas
    public function index(Request $request){
        //Filter komunitas
        $listKom = Komunitas::join('anggota','komunitas.ketuaId','=','anggota.anggotaId')
                    ->join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                    ->where('komunitas.nama','like',"%$request->search%")
                    ->select('komunitas.*','datadiri.nama as ketua')
                    ->get();
        if($request->filter=='-'||$request->filter==null)$listJenis = ['LO','LSO','Komunitas'];
        else $listJenis = [$request->filter];
        $listFiltered = [];
        foreach($listJenis as $jenis){
            $listFiltered[$jenis]=$listKom->where('jenis',$jenis);
        }
        return view('Anggota.index-login',['komunitas'=>$listFiltered,'listJenis'=>['LO','LSO','Komunitas'],'filterParam'=>$request->filter]);
    }

    //Load halaman profil user
    public function showProfil(){
        $userId = session()->get('sessioninfo')[0]['userId'];
        $userInfo = User::join('datadiri','users.userId','=','datadiri.userId')
                    ->where('users.userId',$userId)
                    ->get()[0];
        $bJoin = Anggota::join('komunitas','anggota.komunitasId','=','komunitas.komunitasId')
                    ->where('anggota.userId',$userId)
                    ->count();
        $bKetua = Anggota::join('komunitas','anggota.anggotaId','=','komunitas.ketuaId')
                    ->where('anggota.userId',$userId)
                    ->count();
        $stats = ['banyakJoinKom'=>$bJoin,'banyakKetuaKom'=>$bKetua];
        $listFakultas = ['FILKOM','FIA','FEB','FH','FIB','FISIP','FK','FKG','FPIK','FP','FAPET','FT','FTP','FMIPA'];
        return view('Anggota.profile-user',['userInfo'=>$userInfo,'stats'=>$stats,'listFakultas'=>$listFakultas]);
    }

    //Load halaman join komunitas
    public function joinKomunitas($komunitasId){
        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listDivisi = Divisi::where('komunitasId',$komunitasId)->get();
        return view('Anggota.join-komunitas',['komunitas'=>$infoKom,'divisis'=>$listDivisi]);
    }

    //Load halaman komunitas saya
    public function myKomunitas(Request $request){

        $userId = session()->get('sessioninfo')[0]['userId'];
        $listKomunitas = Komunitas::join('anggota','komunitas.komunitasId','=','anggota.komunitasId')
                        ->join('jabatan','anggota.jabatanId','=','jabatan.jabatanId')
                        ->where('komunitas.nama','like',"%$request->search%")
                        ->where('komunitas.jenis','like',"%$request->filter%")
                        ->where('anggota.userId',$userId)
                        ->where('anggota.statusacc',1)
                        ->select('komunitas.*','jabatan.nama as jabatanku')
                        ->orderBy('komunitas.nama','desc')
                        ->get();
        $idKoms =$listKomunitas->pluck('komunitasId')->all();
        $infoKetua = Anggota::join('komunitas','anggota.anggotaId','=','komunitas.ketuaId')
                        ->join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                        ->join('jabatan','anggota.jabatanId','=','jabatan.jabatanId')
                        ->whereIn('komunitas.komunitasId',$idKoms)
                        ->select('datadiri.foto','jabatan.nama as jabatan','datadiri.nama','anggota.anggotaId')
                        ->orderBy('anggota.anggotaId','desc')
                        ->get();
        return view('Anggota.komunitas-saya',['komunitas'=>$listKomunitas,'listJenis'=>['LO','LSO','Komunitas'],'ketua'=>$infoKetua,'filterParam'=>$request->filter]);
    }

    //Load detail anggota
    public function showInfoAnggota($anggotaId){

        $infoAng = $this->loadInfoanggota($anggotaId);
        return view('Anggota.profile-anggota',['anggota'=>$infoAng]);
    }

    //Update profil User
    public function updateProfil(Request $request){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'email' =>  'required|email',
            'noTelp' =>  'required|numeric',
            'domisili' =>  'required|string',
        ]);//blm ditentukan apa syaratnya
        
        $userId = session()->get('sessioninfo')[0]['userId'];
        $dataUser = DataDiri::where('userId',$userId)->get()[0];

        //Data diri wajib
        $dataDiriId = $dataUser->dataDiriId;
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $noTelp = $_POST['noTelp'];
        $jenisK = $_POST['jenisK'];
        $domisili = $_POST['domisili'];
        
        //Data diri opsional
        $gambar = $dataUser->foto;
        $ig = ($_POST['ig']!='-')?$_POST['ig']:NULL;
        $wa = ($_POST['wa']!='-')?$_POST['wa']:NULL;
        $linked = ($_POST['linkedin']!='-')?$_POST['linkedin']:NULL;
        $line = ($_POST['line']!='-')?$_POST['line']:NULL;
        
        //Proses gambar
        $foto = $gambar;
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $gambar = $_FILES['foto'];
            $foto = 'profil-'.str_replace(' ','-',$userId).'.png';
        }

        //Update DataDiri
        DataDiri::where('dataDiriId',$dataDiriId)->update(['email' => $email, 
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
        'userId' => $userId]);

        //Insert image to file system
        if(is_uploaded_file($_FILES['foto']['tmp_name']))$this->insertImage($gambar['tmp_name'],$foto,'../public/assets/img/profil/');

        return redirect()->route('profil.anggota')->with('success','Data is updated');
    }

    //Gabung komunitas
    public function reqJoinKomunitas(Request $request,$komunitasId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'desc' => 'required|string'
        ]);

        $userId = session()->get('sessioninfo')[0]['userId'];
        $dataDiriId = DataDiri::where('userId',$userId)->value('dataDiriId');
        $anggotaId = $this->generateAnggotaId($komunitasId);
        $divisi = ($request->divisi=='-')?NULL:$request->divisi;
        $jabatan = ($divisi!=NULL)?6:7;
        $this->upsertAnggota($anggotaId,$jabatan,$komunitasId,0,$divisi,$dataDiriId,$userId,$request->desc);
        return redirect()->route('showMyKomunitas.anggota')->with('success','Join request is sent and waiting to be accepted');
    }

    //Leave komunitas
    public function leaveKomunitas($komunitasId){

        $userId = session()->get('sessioninfo')[0]['userId'];
        $infoAng = Anggota::where('komunitasId',$komunitasId)->where('userId',$userId)->get()[0];
        if($infoAng->jabatanId<=5){
            return redirect()->route('showMyKomunitas.anggota')->with('gagal','Anda masih menjabat di organisasi ini');
        }
        Anggota::where('anggotaId',$infoAng->anggotaId)->delete();
        
        return redirect()->route('showMyKomunitas.anggota')->with('success','Berhasil keluar dari komunitas');
    }

//Ketua dan anggota
    //Load halaman detail komunitas untuk anggota atau ketua
    public function showDetailKomunitas($komunitasId){
        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get();
        $listAnggota = $this->loadListAnggota($komunitasId);
        $listDivisi = $this->loadListDivisi($komunitasId);
        $listProker = $this->loadListProker($komunitasId);

        //Guest blocker
        if(!session()->has('sessioninfo')){
            return view('Pengguna.laman-komunitas',['komunitas'=>$infoKom[0],'anggotas'=>$listAnggota,
            'divisis'=>$listDivisi,'prokers'=>$listProker]);
        }

        $userId = session()->get('sessioninfo')[0]['userId'];
        $joined = ($listAnggota->contains('userId',$userId))?($listAnggota->firstWhere('userId',$userId)->statusacc):-1;
        if($this->isKetua($userId,$komunitasId)){
            return view('Ketua.laman-komunitasK',['komunitas'=>$infoKom[0],'anggotas'=>$listAnggota,
            'divisis'=>$listDivisi,'prokers'=>$listProker,'mine'=>$userId]);   
        }
        else{
            return view('Anggota.laman-komunitasA',['komunitas'=>$infoKom[0],'anggotas'=>$listAnggota,
            'divisis'=>$listDivisi,'prokers'=>$listProker,'mine'=>$userId,'joined'=>$joined]);   
        }
    }

    //Load halaman daftar anggota untuk anggota atau ketua
    public function showAllAnggota($komunitasId){

        $userId =session()->get('sessioninfo')[0]['userId'];
        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listAnggota = $this->loadListAnggota($komunitasId)->sortBy([['divisiNama','desc'],['statusacc','desc']]);
        $joined = ($listAnggota->contains('userId',$userId))?($listAnggota->firstWhere('userId',$userId)->statusacc):-1;
        if($this->isKetua($userId,$komunitasId)){
            return view('Ketua.daftarAnggotaK',['anggotas'=>$listAnggota,'komunitas'=>$infoKom,'mine'=>$userId]);
        }
        else{
            return view('Anggota.daftarAnggotaA',['anggotas'=>$listAnggota,'komunitas'=>$infoKom,'mine'=>$userId,'joined'=>$joined]);
        }
    }

    //Load edit info anggota untuk anggota atau ketua
    public function showEditAnggota($anggotaId){

        $userId = session()->get('sessioninfo')[0]['userId'];
        $infoAng = $this->loadInfoanggota($anggotaId);
        $listJabatan = Jabatan::all();
        $listDivisi = $this->loadListDivisi($infoAng->komunitasId);
        $listFakultas = ['FILKOM','FIA','FEB','FH','FIB','FISIP','FK','FKG','FPIK','FP','FAPET','FT','FTP','FMIPA'];
        if($this->isKetua($userId,$infoAng->komunitasId)){
            return view('Ketua.edit-anggotaK',['anggota'=>$infoAng,'listFakultas'=>$listFakultas,
            'listJabatan'=>$listJabatan,'listDivisi'=>$listDivisi]);
        }
        else{
            return view('Anggota.edit-anggota',['anggota'=>$infoAng,'listFakultas'=>$listFakultas]);
        }
    }

    //Update anggota untuk anggota atau ketua
    public function updateDataAnggota(Request $request,$anggotaId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'email' =>  'required|email',
            'noTelp' =>  'required|numeric',
            'domisili' => 'required|string'
        ]);//blm ditentukan apa syaratnya
        
        $dataAng = $this->loadInfoanggota($anggotaId);

        //Data diri wajib
        $dataDiriId = $dataAng->dataDiriId;
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $noTelp = $_POST['noTelp'];
        $jenisK = $_POST['jenisK'];
        $domisili = $_POST['domisili'];
        
        //Data diri opsional
        $gambar = $dataAng->foto;
        $ig = ($_POST['ig']!='-')?$_POST['ig']:NULL;
        $wa = ($_POST['wa']!='-')?$_POST['wa']:NULL;
        $linked = ($_POST['linkedin']!='-')?$_POST['linkedin']:NULL;
        $line = ($_POST['line']!='-')?$_POST['line']:NULL;
        $userId = $dataAng->userId;
        
        //Proses gambar
        $foto = $gambar;
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $gambar = $_FILES['foto'];
            $foto = 'profil-'.str_replace(' ','-',$userId).'.png';
        }

        $komunitasId = $dataAng->komunitasId;
        $status = $dataAng->statusacc;
        $jabatan = $_POST['jabatan'];
        $jabatan = Jabatan::where('nama',$jabatan)->value('jabatanId');
        $divisiId = ($_POST['divisi']!='-')?$_POST['divisi']:NULL;
        $desc = ($_POST['desc']!='-')?$_POST['desc']:NULL;

        //Update DataDiri
        DataDiri::where('dataDiriId',$dataDiriId)->update(['email' => $email, 
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
        'userId' => $userId]);

        //Insert image to file system
        if(is_uploaded_file($_FILES['foto']['tmp_name']))$this->insertImage($gambar['tmp_name'],$foto,'../public/assets/img/profil/');

        //Update Anggota
        $this->upsertAnggota($anggotaId,$jabatan,$komunitasId,$status,$divisiId,$dataDiriId,$userId,$desc);
        
        return redirect()->route('showAllAnggota.anggota',['komunitasId'=>$komunitasId])->with('success','Data is updated');
    }

    //Filter list anggota untuk anggota atau ketua
    public function filterAnggota(Request $request,$komunitasId){

        $userId = session()->get('sessioninfo')[0]['userId'];
        $hasil = $this->hasilFilter($request->search,$komunitasId);
        $joined = ($hasil[0]->contains('userId',$userId))?($hasil[0]->firstWhere('userId',$userId)->statusacc):-1;
        if($this->isKetua($userId,$komunitasId)){
            return view('Ketua.daftarAnggotaK',['anggotas'=>$hasil[0],'komunitas'=>$hasil[1],'mine'=>$userId]);
        }
        else{
            return view('Anggota.daftarAnggotaA',['anggotas'=>$hasil[0],'komunitas'=>$hasil[1],'mine'=>$userId, 'joined'=>$joined]);
        }
    }

//Method pembantu
    //Load list anggota
    public function loadListAnggota($komunitasId){
        $listAnggota = Anggota::join('jabatan','anggota.jabatanId','=','jabatan.jabatanId')
                    ->leftJoin('divisi','anggota.divisiId','=','divisi.divisiId')
                    ->join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                    ->where('anggota.komunitasId',$komunitasId)
                    ->select('anggota.*','datadiri.*','jabatan.nama as jabatan','divisi.nama as divisiNama')
                    ->get();
        return $listAnggota;
    }

    //Load info anggota
    public function loadInfoanggota($anggotaId){
        $infoAng = Anggota::join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                    ->join('jabatan','anggota.jabatanId','=','jabatan.jabatanId')
                    ->leftJoin('divisi','anggota.divisiId','=','divisi.divisiId')
                    ->where('anggota.anggotaId',$anggotaId)
                    ->select('anggota.*','datadiri.*','jabatan.nama as jabatan','divisi.nama as divisiNama')
                    ->get();
        return $infoAng[0];
    }
    
    //Load list divisi
    public function loadListDivisi($komunitasId){
        $listDivisi = Divisi::leftJoin('anggota','divisi.ketuaId','=','anggota.anggotaId')
                    ->join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                    ->where('divisi.komunitasId',$komunitasId)
                    ->select('divisi.*','datadiri.nama as ketua')
                    ->get();
        return $listDivisi;
    }

    //Load list proker
    public function loadListProker($komunitasId){
        $listProker = Proker::leftJoin('divisi','proker.divisiId','=','divisi.divisiId')
                        ->where('proker.komunitasId',$komunitasId)
                        ->select('proker.*','divisi.nama as divisi')
                        ->get();
        return $listProker;
    }

    //Return daftar filter anggota
    public function hasilFilter($keyword,$komunitasId){
        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listAnggota = Anggota::join('jabatan','anggota.jabatanId','=','jabatan.jabatanId')
                    ->leftJoin('divisi','anggota.divisiId','=','divisi.divisiId')
                    ->join('datadiri','anggota.dataDiriId','=','datadiri.dataDiriId')
                    ->where('anggota.komunitasId',$komunitasId)
                    ->where('datadiri.nama','like',"%$keyword%")
                    ->select('anggota.*','datadiri.*','jabatan.nama as jabatan','divisi.nama as divisiNama')
                    ->get()
                    ->sortBy([['divisiNama','desc'],['statusacc','desc']]);
        return [$listAnggota,$infoKom];
    }

    //Cek status ketua atau anggota
    public function isKetua($userId,$komunitasId){
        $jabatan = Anggota::where('komunitasId',$komunitasId)
                    ->where('userId',$userId)->value('jabatanId');
        return $jabatan==1;
    }
}
