<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Membuat Laporan PDF Mahasiswa</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Mahasiswa {{ $Mahasiswa->Nama }}</h4>
    </center>


    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Sks</th>
                <th scope="col">Semester</th>
                <th scope="col">Nilai</th>
                <th scope="col">Jam</th>
            </tr>
        </thead>
        <tbody>


            {{-- menampilkan data dari matakuliah --}}
            @foreach ($mahasiswaMataKuliah as $mahasiswaMk)
                <tr>
                    <td>{{ $mahasiswaMk->mataKuliah->nama_matkul }}</td>
                    <td>{{ $mahasiswaMk->mataKuliah->sks }}</td>
                    <td>{{ $mahasiswaMk->mataKuliah->semester }}</td>
                    <td>{{ $mahasiswaMk->nilai }}</td>
                </tr>
            @endforeach


            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
            </script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        </tbody>
    </table>
</body>
</html>