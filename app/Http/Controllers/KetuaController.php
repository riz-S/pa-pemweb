<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Komunitas;
use App\Models\Proker;
use App\Models\DataDiri;
use App\Models\Anggota;
use App\Models\Divisi;
use App\Models\Jabatan;

class KetuaController extends AnggotaController
{
    //Load halaman buat komunitas
    public function showBuatKomunitas(){

        return view('Ketua.buatKomunitas');
    }

    //Load halaman syarat dan ketentuan
    public function showSK(){

        return view('Anggota.syaratKetentuan');
    }

    //Insert Komunitas
    public function createKomunitas(Request $request){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'alamat' =>  'required|string',
            'desc' => 'required|string',
            'agree' =>  'accepted'
        ]);

        $gambar = (is_uploaded_file($_FILES['logo']['tmp_name'])) ?$_FILES['logo'] :null;
        $userId = session()->get('sessioninfo')[0]['userId'];
        $dataDiriId = DataDiri::where('userId',$userId)->value('dataDiriId');
        
        //Create Komunitas
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis = $_POST['jenis'];
        $desc = $_POST['desc'];
        $logo = ($gambar==NULL)? NULL:'logo-'.str_replace(' ','-',$nama).'.png';
        $email = (!empty($_POST['email'])) ?$_POST['email'] :null;
        $line = (!empty($_POST['ig'])) ?$_POST['ig'] :null;
        $ig = (!empty($_POST['line'])) ?$_POST['line'] :null;
        $ytb = (!empty($_POST['youtube'])) ?$_POST['youtube'] :null;
        $komunitasId = $this->insertKomunitas($nama,$alamat,$jenis,$desc,$logo,$email,$line,$ig,$ytb);

        //Insert image to file system
        $dest = '../public/assets/img/logo-komunitas/';
        if($logo!=NULL)$this->insertImage($gambar['tmp_name'],$logo,$dest);

        //Create ketua
        $ketuaId =$this->generateAnggotaId($komunitasId);
        $this->upsertAnggota($ketuaId,1,$komunitasId,1,NULL,$dataDiriId,$userId,"Saat ini menjabat sebagai ketua $nama");
        Komunitas::where('komunitasId', $komunitasId)->update(['ketuaId'=> $ketuaId]);

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Komunitas $nama berhasil dibuat");
    }

    //Load edit komunitas
    public function editDataKomunitas($komunitasId){

        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        return view('Ketua.edit-komunitas',['komunitas'=>$infoKom]);
    }

    //Update komunitas
    public function updateDataKomunitas(Request $request, $komunitasId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'alamat' =>  'required|string',
            'desc' =>  'required|string'
        ]);

        $komunitas = new Komunitas;
        $dataKom = $komunitas->where('komunitasId',$komunitasId)->get()[0];
        
        if($_FILES['logoKom']!=NULL){
            $gambar = $_FILES['logoKom'];
            $dest = '../public/assets/img/logo-komunitas/';
            $logo = $dataKom->logo;
            $this->insertImage($gambar['tmp_name'],$logo,$dest);
        }

        //Update data komunitas
        $komunitas->where('komunitasId', $komunitasId)->update([
            'nama' => $request->nama, 
            'alamat' => $request->alamat,
            'jenis'=>$request->jenis, 
            'deskripsi' => $request->desc,
            'email'=>($request->email!='-')?$request->email:NULL,
            'ig'=>($request->ig!='-')?$request->ig:NULL,
            'line'=>($request->line!='-')?$request->line:NULL,
            'youtube'=>($request->youtube!='-')?$request->youtube:NULL
        ]);

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Data komunitas berhasil diubah");
    }

    //Delete komunitas
    public function deleteDataKomunitas($komunitasId){

        Komunitas::where('komunitasId',$komunitasId)->update(['ketuaId'=>null]);
        Proker::where('komunitasId',$komunitasId)->delete();
        Divisi::where('komunitasId',$komunitasId)->delete();
        Anggota::where('komunitasId',$komunitasId)->delete();
        Komunitas::where('komunitasId',$komunitasId)->delete();

        return redirect()->route('showMyKomunitas.anggota')->with('success','Komunitas berhasil dihapus');
    }   
    
    //Load halaman tambah divisi
    public function addDivisi($komunitasId){

        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listAnggota = $this->loadListAnggota($komunitasId);
        return view('Ketua.tambah-divisi',['komunitas'=>$infoKom,'listAnggota'=>$listAnggota]);
    }

    //Load halaman update divisi
    public function editDivisi($divisiId){

        $infoDivisi = Divisi::where('divisiId',$divisiId)->get()[0];
        $infoKom = Komunitas::where('komunitasId',$infoDivisi->komunitasId)->get()[0];
        $listAnggota = $this->loadListAnggota($infoDivisi->komunitasId);

        return view('Ketua.edit-divisi',['komunitas'=>$infoKom,'listAnggota'=>$listAnggota,'divisi'=>$infoDivisi]);
    }
    
    //Tambah divisi
    public function createDivisi(Request $request,$komunitasId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  ['required','string',
                        Rule::unique('divisi')->where(function ($query) use ($komunitasId) {
                            return $query->where('komunitasId', $komunitasId);
                        })],
            'desc' =>'required|string'
        ]);
        $divisiId = $this->generateDivisiId($komunitasId);
        $nama = $_POST['nama'];
        $ketuaId = $_POST['ketua'];
        $desc = $_POST['desc'];
        $gambar = (is_uploaded_file($_FILES['logo']['tmp_name'])) ?$_FILES['logo']:NULL;
        $logo = ($gambar==NULL)? NULL:'logo-'.$divisiId.'.png';

        $this->upsertDivisi($divisiId,$nama,$komunitasId,$ketuaId,$desc,$logo);

        //Insert image to file system
        $dest = '../public/assets/img/logo-divisi/';
        if($logo!=NULL)$this->insertImage($gambar['tmp_name'],$logo,$dest);

        if(Anggota::where('anggotaId',$ketuaId)->value('jabatanId')>5)Anggota::where('anggotaId',$ketuaId)->update(['jabatanId'=>5]);

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Divisi $nama berhasil ditambahkan");
    }

    //Update divisi
    public function updateDivisi(Request $request,$divisiId){

        $infoDivisi = Divisi::where('divisiId',$divisiId)->get()[0];
        $request->validate([
            'nama' =>  ['required','string',
                        Rule::unique('divisi')->where(function ($query) use ($infoDivisi) {
                            return $query->where('komunitasId', $infoDivisi->komunitasId)->where('nama','!=',$infoDivisi->nama);
                        })],
            'desc' =>'required|string'
        ]);
        $ketuaLamaId = $infoDivisi->ketuaId;

        $nama = $_POST['nama'];
        $ketuaId = $_POST['ketua'];
        $desc = $_POST['desc'];
        $gambar = (is_uploaded_file($_FILES['logo']['tmp_name'])) ?$_FILES['logo']:NULL;
        $logo = ($gambar==NULL)? NULL:'logo-'.$divisiId.'.png';

        $this->upsertDivisi($divisiId,$nama,$infoDivisi->komunitasId,$ketuaId,$desc,$logo);
        
        //Insert image to file system
        $dest = '../public/assets/img/logo-divisi/';
        if($gambar!=NULL)$this->insertImage($gambar['tmp_name'],$logo,$dest);
        
        //Ketua lama
        $listKadiv = Divisi::where('komunitasId',$infoDivisi->komunitasId)->pluck('ketuaId')->unique();
        if(!$listKadiv->contains($ketuaLamaId)){
            $divisiKetua = Anggota::where('anggotaId',$ketuaLamaId)->value('divisiId');
            Anggota::where('anggotaId',$ketuaLamaId)->update(['jabatanId'=>(($divisiKetua)?6:7)]);
        }
        //Ketua baru
        if(Anggota::where('anggotaId',$ketuaId)->value('jabatanId')>5)Anggota::where('anggotaId',$ketuaId)->update(['jabatanId'=>5]);

        return redirect()->route('showInfoKomunitas.anggota',[$infoDivisi->komunitasId])->with('success',"Info divisi $nama berhasil diubah");
    }

    //Delete divisi
    public function deleteDivisi($divisiId){

        $infoDivisi = Divisi::where('divisiId',$divisiId)->get()[0];
        $ketuaLamaId = $infoDivisi->ketuaId;
        Divisi::where('divisiId',$divisiId)->delete();

        $listKadiv = Divisi::where('komunitasId',$infoDivisi->komunitasId)->pluck('ketuaId')->unique();
        if(!$listKadiv->contains($ketuaLamaId)){
            $divisiKetua = Anggota::where('anggotaId',$ketuaLamaId)->value('divisiId');
            Anggota::where('anggotaId',$ketuaLamaId)->update(['jabatanId'=>(($divisiKetua)?6:7)]);
        }

        return redirect()->route('showInfoKomunitas.anggota',[$infoDivisi->komunitasId])->with('success',"Divisi berhasil dihapus");
    }

    //Load halaman tambah proker
    public function addProker($komunitasId){

        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listDivisi = Divisi::where('komunitasId',$komunitasId)->get();

        return view('Ketua.tambah-proker',['komunitas'=>$infoKom, 'listDivisi'=>$listDivisi]);
    }

    //Load halaman edit proker
    public function editProker($prokerId){

        $proker = new Proker;
        $dataProker = $proker->where('prokerId',$prokerId)->get()[0];
        $listDivisi = Divisi::where('komunitasId',$dataProker->komunitasId)->get();
        return view('Ketua.edit-proker',['proker'=>$dataProker,'listDivisi'=>$listDivisi]);
    }

    //Tambah proker
    public function createProker(Request $request,$komunitasId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'tglProker' =>  'required|date',
            'desc' =>'required|string'
        ]);
        $prokerId = $this->generateProkerId($komunitasId);
        $nama = $_POST['nama'];
        $tglProker = $_POST['tglProker'];
        $desc = $_POST['desc'];
        $divisi = ($_POST['divisi']!='-') ?$_POST['divisi'] :null;
        $gambar = (is_uploaded_file($_FILES['logo']['tmp_name'])) ?$_FILES['logo']:NULL;
        $logo = ($gambar==NULL)? NULL:'logo-'.$prokerId.'.png';

        $this->upsertProker($prokerId,$nama,$tglProker,$komunitasId,$logo,$divisi,$desc);

        //Insert image to file system
        $dest = '../public/assets/img/logo-proker/';
        if($logo!=NULL)$this->insertImage($gambar['tmp_name'],$logo,$dest);

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Proker $nama berhasil ditambahkan");
    }

    //Update proker
    public function updateProker(Request $request, $prokerId){

        $infoProker = Proker::where('prokerId',$prokerId)->get()[0];
        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>  'required|string',
            'tglProker' =>  'required|date',
            'desc' =>'required|string'
        ]);
        $komunitasId = $infoProker->komunitasId;
        $nama = $_POST['nama'];
        $tglProker = $_POST['tglProker'];
        $desc = $_POST['desc'];
        $divisi = ($_POST['divisi']!='-') ?$_POST['divisi'] :null;
        $gambar = (is_uploaded_file($_FILES['logo']['tmp_name'])) ?$_FILES['logo']:NULL;
        $logo = ($gambar==NULL)? NULL:'logo-'.$prokerId.'.png';

        $this->upsertProker($prokerId,$nama,$tglProker,$komunitasId,$logo,$divisi,$desc);

        //Insert image to file system
        $dest = '../public/assets/img/logo-proker/';
        if($logo!=NULL)$this->insertImage($gambar['tmp_name'],$logo,$dest);

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Proker $nama berhasil diubah");
    }

    //Delete proker
    public function deleteProker($prokerId){

        $komunitasId = Proker::where('prokerId',$prokerId)->value('komunitasId');
        Proker::where('prokerId',$prokerId)->delete();
        
        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Proker berhasil dihapus");
    }
    
    //Load halaman tambah anggota
    public function addAnggota($komunitasId){

        $infoKom = Komunitas::where('komunitasId',$komunitasId)->get()[0];
        $listJabatan = Jabatan::all();
        $listDivisi = $this->loadListDivisi($komunitasId);
        $listFakultas = ['FILKOM','FIA','FEB','FH','FIB','FISIP','FK','FKG','FPIK','FP','FAPET','FT','FTP','FMIPA'];
        return view('Ketua.tambah-anggota',['komunitas'=>$infoKom,'listDivisi'=>$listDivisi,'listFakultas'=>$listFakultas,'listJabatan'=>$listJabatan]);
    }

    //Tambah anggota
    public function createAnggota(Request $request,$komunitasId){

        //Validasi Input sesuai syaratnya
        $request->validate([
            'nama' =>'required|string',
            'desc' => 'required|string',
            'email' => 'required|email',
            'noTelp' => 'required|numeric',
            'domisili' => 'required|string',
            'desc' => 'required|string',
        ]);

        //Data diri wajib
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $noTelp = $_POST['noTelp'];
        $jenisK = $_POST['jenisK'];
        $domisili = $_POST['domisili'];

        //Data diri opsional
        $gambar = (is_uploaded_file($_FILES['foto']['tmp_name']))?$_FILES['foto']['tmp_name']:NULL;
        $ig = ($_POST['ig']!='-')?$_POST['ig']:NULL;
        $wa = ($_POST['wa']!='-')?$_POST['wa']:NULL;
        $linked = ($_POST['linkedin']!='-')?$_POST['linkedin']:NULL;
        $line = ($_POST['line']!='-')?$_POST['line']:NULL;
        
        //Proses gambar
        $foto = $gambar;
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $gambar = $_FILES['foto'];
            $foto = 'profil-'.str_replace(' ','-',$nama).'.png';
        }

        //Update DataDiri
        $dataDiriId = $this->insertDataDiri($email,$nama,$fakultas,$noTelp,$jenisK,$domisili,$foto,$ig,$wa,$linked,$line,NULL);

        //Insert image to file system
        if(is_uploaded_file($_FILES['foto']['tmp_name']))$this->insertImage($gambar['tmp_name'],$foto,'../public/assets/img/profil/');

        $anggotaId = $this->generateAnggotaId($komunitasId);
        $divisi = ($request->divisi=='-')?NULL:$request->divisi;
        $jabatan = ($divisi!=NULL && $request->jabatan>6)?6:$request->jabatan;
        $desc = ($_POST['desc']!='-')?$_POST['desc']:NULL;

        //Update Anggota
        $this->upsertAnggota($anggotaId,$jabatan,$komunitasId,1,$divisi,$dataDiriId,NULL,$desc);
        
        return redirect()->route('showAllAnggota.anggota',['komunitasId'=>$komunitasId])->with('success','Member is created');
    }
    
    //Delete anggota
    public function deleteAnggota($anggotaId){

        $komunitasId = Anggota::where('anggotaId',$anggotaId)->value('komunitasId');
        if(Divisi::where('komunitasId',$komunitasId)->where('ketuaId',$anggotaId)->get()->count()!=0)Divisi::where('komunitasId',$komunitasId)->where('ketuaId',$anggotaId)->update(['ketuaId'=>Komunitas::where('komunitasId',$komunitasId)->value('ketuaId')]);
        Anggota::where('anggotaId',$anggotaId)->delete();

        return redirect()->route('showAllAnggota.anggota',['komunitasId'=>$komunitasId])->with('success','Member is removed');
    }

    //Accept atau Unaccept anggota
    public function accAnggota(Request $request,$komunitasId){

        $answer = explode('|',$request->answer);
        if($answer[0]=='acc'){
            Anggota::where('anggotaId',$answer[1])->update(['statusacc'=>1]);
        }
        else{
            Anggota::where('anggotaId',$answer[1])->delete();
        }
        $jawab = ($answer[0]=='acc')?'terima':'tolak';

        return redirect()->route('showInfoKomunitas.anggota',[$komunitasId])->with('success',"Permintaan anggota di$jawab");
    }

    //Beri jabatan ketua kepada anggota
    public function tukarKetua($anggotaId){

        $infoAng = Anggota::where('anggotaId',$anggotaId)->get()[0];
        $infoKom = Komunitas::where('komunitasId',$infoAng->komunitasId)->get()[0];
        $infoKetuaLama = Anggota::where('anggotaId',$infoKom->ketuaId)->get()[0];
        
        if(Divisi::where('komunitasId',$infoAng->komunitasId)->pluck('ketuaId')->contains($infoKetuaLama->anggotaId)){
            Anggota::where('anggotaId',$infoKetuaLama->anggotaId)->update(['jabatanId'=>5]);
        }
        else if($infoKetuaLama->divisiId!=null){
            Anggota::where('anggotaId',$infoKetuaLama->anggotaId)->update(['jabatanId'=>6]);
        }
        else{
            Anggota::where('anggotaId',$infoKetuaLama->anggotaId)->update(['jabatanId'=>7]);
        }
        
        Komunitas::where('komunitasId',$infoAng->komunitasId)->update(['ketuaId'=>$anggotaId]);
        Anggota::where('anggotaId',$anggotaId)->update(['jabatanId'=>1]);

        return redirect()->route('showAllAnggota.anggota',['komunitasId'=>$infoAng->komunitasId])->with('success','Serah jabatan berhasil dilakukan');
    }

}
