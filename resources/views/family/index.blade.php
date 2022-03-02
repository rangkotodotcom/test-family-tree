<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family Tree</title>
</head>

<body>
    <h3>
        Daftar Family
    </h3>

    <a href="/family/create">Tambah</a>

    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>
                    Nama
                </td>
                <td>
                    Jenis Kelamin
                </td>
                <td>
                    Ortu
                </td>
                <td>
                    Aksi
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($families as $family)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $family->nama }}
                </td>
                <td>
                    {{ $family->jk }}
                </td>
                <td>
                    {{ $family->ortu }}
                </td>
                <td>
                    <a href="/family/{{ $family->id }}/edit">Edit</a> |
                    <form action="/family/{{ $family->id }}" method="post">

                        @method('DELETE')
                        @csrf

                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <hr>

    <h2>Anak Budi</h2>
    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>Nama</td>
            </tr>
        </thead>
        <tbody>
            @foreach($allAnak as $a)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $a->nama }}
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    <hr>

    <h2>Cucu Budi</h2>
    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>Nama</td>
            </tr>
        </thead>
        <tbody>
            @foreach($allcucu as $a)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $a->nama }}
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    <hr>

    <h2>Cucu Perempuan Budi</h2>
    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>Nama</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cucupr as $a)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $a->nama }}
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    <hr>

    <h2>Bibi Farah</h2>
    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>Nama</td>
            </tr>
        </thead>
        <tbody>
            @foreach($bibifarah as $a)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $a->nama }}
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>

    <hr>

    <h2>Sepupu Laki-Laki Hani</h2>
    <table border="1px solid" cellpadding="5px">
        <thead>
            <tr>
                <td>
                    No
                </td>
                <td>Nama</td>
            </tr>
        </thead>
        <tbody>
            @foreach($sepupulkhani as $a)

            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $a->nama }}
                </td>
            </tr>

            @endforeach
        </tbody>

    </table>
</body>

</html>