<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagram</title>
</head>

<body>

    <ul>
        <li @if($families->jk == 'L') style="color: blue" @endif>
            {{ $families->nama }}
        </li>

        @foreach($families->anak as $anak)

        <ul>
            <li @if($anak->jk == 'L') style="color: blue" @else style="color:red" @endif>
                {{ $anak->nama }}
            </li>

            @foreach($anak->anak as $cucu)

            <ul>
                <li @if($cucu->jk == 'L') style="color: blue" @else style="color:red" @endif>
                    {{ $cucu->nama }}
                </li>
            </ul>

            @endforeach

        </ul>

        @endforeach
    </ul>
</body>

</html>