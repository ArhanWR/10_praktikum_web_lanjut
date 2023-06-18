@extends('mahasiswas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="300px">Action</th>
        </tr>
        @foreach ($mahasiswas as $Mahasiswa)
        <tr>
 
            <td>{{ $Mahasiswa->Nim }}</td>
            <td>{{ $Mahasiswa->Nama }}</td>
            <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ $Mahasiswa->Jurusan }}</td>

            <td>
            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST" onsubmit="return confirm('Yakin akan menghapus data?')">
 
                    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-danger" href="{{ route('mahasiswas.showKhs',$Mahasiswa->Nim) }}">Nilai</a>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- Tampilkan link pagination -->
    <div class="pagination">
        {{ $mahasiswas->links() }}
    </div>
@endsection