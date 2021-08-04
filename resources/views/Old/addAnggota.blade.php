<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('create.komunitas')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama Anggota</label>
        <input type="text" name="nama" id="">
        <br>
        <br>
        <label for="email">Email Anggota</label>
        <input type="email" name="email" id="">
        <br>
        <br>
        <label for="jabatan">Jabatan Anggota</label>
        <input type="text" name="jabatan" id="">
        <br>
        <br>
        <label for="divisi">Divisi Anggota</label>
        <input type="text" name="divisi" id="">
        <br>
        <br>
        <label for="fakultas">Fakultas Anggota</label>
        <input type="text" name="fakultas" id="">
        <br>
        <br>
        <label for="noTelp">Nomor Telepon Anggota</label>
        <input type="text" name="noTelp" id="">
        <br>
        <br>
        <label for="jenisK">Gender Anggota</label>
        <input type="text" name="jenisK" id="">
        <br>
        <br>
        <label for="asal">Domisili Anggota</label>
        <input type="text" name="asal" id="">
        <br>
        <br>
        <label for="foto">Foto Anggota</label>
        <input type="file" name="foto" id="">
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <h5>Divisi</h5>
    <ul>
        @forelse($divisi as $cek)
            <li><?php var_dump($cek)?></li>
            <br>
        @empty
            <li>Belum ada event.</li>
        @endforelse
    </ul>
    <h5>Anggota</h5>
    <ul>
        @forelse($anggota as $cek)
            <li><?php var_dump($cek)?></li>
            <br>
        @empty
            <li>Belum ada Anggota.</li>
        @endforelse
    </ul>
    <h5>Data Diri</h5>
    <ul>
        @forelse($dataAng as $cek)
            <li><?php var_dump($cek)?></li>
            <br>
        @empty
            <li>Belum ada Data Anggota.</li>
        @endforelse
    </ul>
</body>
</html>