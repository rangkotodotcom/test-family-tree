<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
</head>

<body>
    <form action="/family/{{ $family->id }}" method="post">
        @method('PUT')
        @csrf
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $family->nama }}">
        </div>

        <div style="margin-top: 10px">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk">
                <option>Pilih</option>
                <option value="L" @if($family->jk == 'L'){{ "selected"}} @endif>Laki-Laki</option>
                <option value="P" @if($family->jk == 'P'){{ "selected"}} @endif>Perempuan</option>
            </select>
        </div>

        <div style="margin-top: 10px">
            <label for="tingkat">Tingkat</label>
            <select name="tingkat" id="tingkat">
                <option> Pilih </option>
                <option value="1" @if($family->tingkat == '1'){{ "selected"}} @endif>Ayah</option>
                <option value="2" @if($family->tingkat == '2'){{ "selected"}} @endif>Anak</option>
                <option value="3" @if($family->tingkat == '3'){{ "selected"}} @endif>Cucu</option>
            </select>
        </div>

        <div style="margin-top: 10px">
            <label for="ortu">Ortu</label>
            <select name="ortu" id="ortu">
                <option> Pilih </option>
                @foreach($ortu as $o)

                @if($o->nama == $family->ortu)

                <option value="{{ $o->nama }}" selected>{{ $o->nama }}</option>

                @else

                <option value="{{ $o->nama }}">{{ $o->nama }}</option>

                @endif

                @endforeach
            </select>
        </div>

        <button type="submit" style="margin-top: 10px">Simpan</button>

    </form>
</body>

</html>