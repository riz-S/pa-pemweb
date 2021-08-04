<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*************Guest*************/
Route::get('/dashboard',[RegisteredUserController::class,'store'])->name('dashboard');

Route::get('/welp',[AnggotaController::class, 'kicked'])->name('dilarang');

/*************Anggota/user*************/
//Delete akun
Route::get('/deleteAkun/{userId}', [AnggotaController::class, 'deleteAkun'])->middleware('auth')
->name('deleteAkun.user');

//Diarahkan ke halaman utama anggota
Route::get('/', [AnggotaController::class, 'index'])
->name('index.anggota');

//Diarahkan ke halaman profil anggota
Route::get('/profil', [AnggotaController::class, 'showProfil'])->middleware('auth')
->name('profil.anggota');

//Diarahkan ke method update profil
Route::post('/profil', [AnggotaController::class, 'updateProfil'])->middleware('auth')
->name('updateProfil.anggota');

//Diarahkan ke page laman komunitas anggota
Route::get('laman-komunitas/{komunitasId}', [AnggotaController::class, 'showDetailKomunitas'])
->name('showInfoKomunitas.anggota');

//Diarahkan ke page join komunitas
Route::get('join-komunitas/{komunitasId}', [AnggotaController::class, 'joinKomunitas'])->middleware('auth')
->name('joinKomunitas.anggota');

//Diarahkan ke page komunitas saya
Route::get('komunitas-saya', [AnggotaController::class, 'myKomunitas'])->middleware('auth')->middleware('auth')
->name('showMyKomunitas.anggota');

//Diarahkan ke method joinKomunitas
Route::post('join-komunitas/{komunitasId}', [AnggotaController::class, 'reqJoinKomunitas'])->middleware('auth')
->name('requestJoinKomunitas.anggota');

//Diarahkan ke page daftar anggota komunitas
Route::get('daftar-anggota/{komunitasId}', [AnggotaController::class, 'showAllAnggota'])->middleware('auth')
->name('showAllAnggota.anggota');

//Diarahkan ke page daftar anggota komunitas setelah difilter
Route::post('daftar-anggota/{komunitasId}', [AnggotaController::class, 'filterAnggota'])->middleware('auth')
->name('filterAnggota.anggota');

//Diarahkan ke page detail anggota
Route::get('info-anggota/{anggotaId}', [AnggotaController::class, 'showInfoAnggota'])->middleware('auth')
->name('showDetailAnggota.anggota');

//Diarahkan ke page edit info anggota
Route::get('edit-data/{anggotaId}', [AnggotaController::class, 'showEditAnggota'])->middleware('auth')
->name('showEditAnggota.anggota');

//Diarahkan ke method update anggota
Route::post('edit-data/{anggotaId}', [AnggotaController::class, 'updateDataAnggota'])->middleware('auth')
->name('updateAnggota.anggota');

//Diarahkan ke method leave komunitas
Route::get('leave/{komunitasId}', [AnggotaController::class, 'leaveKomunitas'])->middleware('auth')
->name('leaveKomunitas.anggota');


/*************Ketua*************/
//Diarahkan ke page buat komunitas
Route::get('buat-komunitas',[KetuaController::class, 'showBuatKomunitas'])->middleware('auth')
->name('buatKomunitas.ketua');

//Memproses data dari page buat komunitas
Route::post('buat-komunitas',[KetuaController::class, 'createKomunitas'])->middleware('auth')
->name('createKomunitas.ketua');

//Diarahkan ke page edit komunitas
Route::get('edit-komunitas/{komunitasId}', [KetuaController::class, 'editDataKomunitas'])->middleware('auth')
->name('editKomunitas.ketua');

//Diarahkan ke method update komunitas
Route::post('edit-komunitas/{komunitasId}', [KetuaController::class, 'updateDataKomunitas'])->middleware('auth')
->name('updateKomunitas.ketua');

//Diarahkan ke method delete komunitas
Route::get('delete-komunitas/{komunitasId}', [KetuaController::class, 'deleteDataKomunitas'])->middleware('auth')
->name('deleteKomunitas.ketua');

//Diarahkan ke page tambah divisi
Route::get('tambah-divisi/{komunitasId}', [KetuaController::class, 'addDivisi'])->middleware('auth')
->name('tambahDivisi.ketua');

//Diarahkan ke method create divisi
Route::post('tambah-divisi/{komunitasId}', [KetuaController::class, 'createDivisi'])->middleware('auth')
->name('createDivisi.ketua');

//Diarahkan ke page edit divisi
Route::get('edit-divisi/{divisiId}', [KetuaController::class, 'editDivisi'])->middleware('auth')
->name('editDivisi.ketua');

//Diarahkan ke method update divisi
Route::post('edit-divisi/{divisiId}', [KetuaController::class, 'updateDivisi'])->middleware('auth')
->name('updateDivisi.ketua');

//Diarahkan ke method delete divisi
Route::get('delete-divisi/{divisiId}', [KetuaController::class, 'deleteDivisi'])->middleware('auth')
->name('deleteDivisi.ketua');

//Diarahkan ke page tambah proker
Route::get('tambah-proker/{komunitasId}', [KetuaController::class, 'addProker'])->middleware('auth')
->name('tambahProker.ketua');

//Diarahkan ke method create proker
Route::post('tambah-proker/{komunitasId}', [KetuaController::class, 'createProker'])->middleware('auth')
->name('createProker.ketua');

//Diarahkan ke page edit proker
Route::get('edit-proker/{prokerId}', [KetuaController::class, 'editProker'])->middleware('auth')
->name('editProker.ketua');

//Diarahkan ke method update proker
Route::post('edit-proker/{prokerId}', [KetuaController::class, 'updateProker'])->middleware('auth')
->name('updateProker.ketua');

//Diarahkan ke method delete proker
Route::get('delete-proker/{prokerId}', [KetuaController::class, 'deleteProker'])->middleware('auth')
->name('deleteProker.ketua');

//Diarahkan ke page tambah anggota
Route::get('tambah-anggota/{komunitasId}', [KetuaController::class, 'addAnggota'])->middleware('auth')
->name('tambahAnggota.ketua');

//Diarahkan ke method create anggota
Route::post('tambah-anggota/{komunitasId}', [KetuaController::class, 'createAnggota'])->middleware('auth')
->name('createAnggota.ketua');

//Diarahkan ke method delete anggota
Route::get('delete-anggota/{anggotaId}', [KetuaController::class, 'deleteAnggota'])->middleware('auth')
->name('deleteAnggota.ketua');

//Diarahkan ke method acc/unacc anggota
Route::post('laman-komunitas/{komunitasId}', [KetuaController::class, 'accAnggota'])->middleware('auth')
->name('accAnggota.ketua');

//Diarahkan ke method tukar jabatan
Route::get('tukar-jabatan/{anggotaId}', [KetuaController::class, 'tukarKetua'])->middleware('auth')
->name('tukarKetua.ketua');

Route::post('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';