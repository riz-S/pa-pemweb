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
        <label for="nama">Nama Komunitas</label>
        <input type="text" name="nama" id="">
        <br>
        <br>
        <label for="alamat">Alamat Komunitas</label>
        <input type="text" name="alamat" id="">
        <br>
        <br>
        <label for="deskripsi">Deskripsi Komunitas</label>
        <input type="text" name="deskripsi" id="">
        <br>
        <br>
        <label for="logo">Logo Komunitas</label>
        <input type="file" name="logo" id="">
        <br>
        <br>
        <label for="sk">Syarat & Ketentuan</label>
        <input type="checkbox" name="sk" id="">
        <br>
        <input type="submit" value="Submit">
    </form>
    <a href="{{route('about.komunitas', ['komunitasId' => 1])}}"><button>Tentang Komunitas</button></a>
    <a href="{{route('proker.komunitas', ['komunitasId' => 1])}}"><button>Proker Komunitas</button></a>
    <a href="{{route('anggota.komunitas', ['komunitasId' => 1])}}"><button>Anggota Komunitas</button></a>
    <a href="{{route('detailAng.komunitas', ['email' => 'tes@gmail.com'])}}"><button>Detail Anggota Komunitas</button></a>
    <a href="{{route('detailPro.komunitas', ['prokerId' => 'ProkerBCC-1'])}}"><button>Detail Proker Komunitas</button></a>
    @if ($errors->any())
    <strong>Data tidak valid</strong>
    <strong><?php echo $errors ?></strong>
    @endif
    @if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
    @endif
</body>
</html>