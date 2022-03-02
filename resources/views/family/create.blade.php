<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
</head>

<body>
    <form action="/family" method="post">
        @csrf
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>

        <div style="margin-top: 10px">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk">
                <option>Pilih</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div style="margin-top: 10px">
            <label for="tingkat">Tingkat</label>
            <select name="tingkat" id="tingkat">
                <option> Pilih </option>
                <option value="1">Ayah</option>
                <option value="2">Anak</option>
                <option value="3">Cucu</option>
            </select>
        </div>

        <div style="margin-top: 10px">
            <label for="ortu">Ortu</label>
            <select name="ortu" id="ortu">
                <option> Pilih </option>
                @foreach($ortu as $o)

                <option value="{{ $o->nama }}">{{ $o->nama }}</option>

                @endforeach
            </select>
        </div>

        <button type="submit" style="margin-top: 10px">Simpan</button>

    </form>
</body>

</html>