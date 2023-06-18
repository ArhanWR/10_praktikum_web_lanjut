<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //yang semula Mahasiswa::all, diubah menjadi with() yang menyatakan relasi
        $mahasiswas = Mahasiswa::with('kelas')->orderBy('nim', 'asc')->paginate(3);
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
            $request->validate([
                'Nim' => 'required',
                'Nama' => 'required',
                'Kelas' => 'required',
                'Jurusan' => 'required',
            ]);

            $mahasiswas = new Mahasiswa;
            $mahasiswas->nim = $request->get('Nim');
            $mahasiswas->nama = $request->get('Nama');
            $mahasiswas->jurusan = $request->get('Jurusan');
            $mahasiswas->save();

            $kelas = new Kelas;
            $kelas->id = $request->get('Kelas');
            
            //fungsi eloquent untuk menambah data dengan relasi belongsTo
            $mahasiswas->kelas()->associate($kelas);
            $mahasiswas->save();
            
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
   
    }

    /**
     * Display the specified resource.
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi --> $mahasiswas = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('Kelas')->where('Nim', $Nim)->first();
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    public function showKhs($Nim)
    {
        // menampilkan detail mahasiswa berdasarkan nim
        $Mahasiswa = Mahasiswa::where('Nim', $Nim)->first();

        // Retrieve the related Mahasiswa_MataKuliah records for the Mahasiswa
        $mahasiswaMataKuliah = Mahasiswa_MataKuliah::where('mahasiswa_id', $Mahasiswa->id)
            ->with('mataKuliah')->get();

        return view('mahasiswas.khs', compact('Mahasiswa', 'mahasiswaMataKuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::with('Kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
                $request->validate([
                    'Nim' => 'required',
                    'Nama' => 'required',
                    'Kelas' => 'required',
                    'Jurusan' => 'required',
                ]);

                $mahasiswas = Mahasiswa::with('Kelas')->where('Nim', $Nim)->first();
                $mahasiswas->nim = $request->get('Nim');
                $mahasiswas->nama = $request->get('Nama');
                $mahasiswas->jurusan = $request->get('Jurusan');
                $mahasiswas->save();

                $kelas = new Kelas;
                $kelas->id = $request->get('Kelas');

                //fungsi eloquent untuk mengupdate data dengan relasi belongsTo
                $mahasiswas->kelas()->associate($kelas);
                $mahasiswas->save();
                
                //jika data berhasil diupdate, akan kembali ke halaman utama
                return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('Nim', $Nim)->delete();
        return redirect()->route('mahasiswas.index')-> with('success', 'Mahasiswa Berhasil Dihapus');
    }
};
