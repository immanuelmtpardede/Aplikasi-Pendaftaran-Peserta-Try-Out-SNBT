<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Kartu Ujian {{ $post->Nama }}</title>
        <style>
            .kartuUjian{
                border: 1px dashed black;
                padding: 50px;
            }
            .judul{
                font-size: 50px;
                text-align: center;
                margin: 0;
            }
            .fotoDiri{
                margin: 30px auto 30px auto;
                width: 150px;
                height: 200px;
                border: 1px solid black;
            }
            table{
                margin: 0 auto 0 auto;
            }
            td:nth-child(2){
                padding: 0 10px 0 10px;
            }
        </style>
    </head>
    <body>
        <div class="kartuUjian">
            <p class="judul">Kartu TRY OUT SNBT</p>
            <center><img class="fotoDiri" src="{{ public_path("storage/" . $post->FotoDiri) }}"></center>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $post->Nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $post->JenisKelamin }}</td>
                </tr>
                <tr>
                    <td>Lokasi Ujian</td>
                    <td>:</td>
                    <td>{{ $post->LokasiUjian }}</td>
                </tr>
            </table>
        </div>
    </body>
</html>