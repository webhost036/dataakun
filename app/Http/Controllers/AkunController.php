<?php

namespace App\Http\Controllers;

use App\Models\akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $katakunci = $request->katakunci;
    $jumlahbaris = 5;

    if (strlen($katakunci)) {
    $data = akun::where('kode_akun', 'like', "%$katakunci%")
        ->orWhere('nama_akun', 'like', "%$katakunci%")
        ->orWhere('deskripsi', 'like', "%$katakunci%")
        ->orWhere('tipe_akun', 'like', "%$katakunci%")
        ->orWhere('kategori_akun', 'like', "%$katakunci%")
        ->orWhere('level_akun', 'like', "%$katakunci%")
        ->paginate($jumlahbaris);
    } else {
    $data = akun::orderBy('kode_akun', 'asc')->paginate($jumlahbaris);
    }

    return view('akun.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'kode_akun' => 'required|numeric|unique:akun',
        'nama_akun' => 'required',
        'deskripsi' => 'required',
        'tipe_akun' => 'required',
        'kategori_akun' => 'required',
        'level_akun' => 'required',
        'created_at' => 'required|date_format:Y-m-d H:i:s',
    ], [
        'kode_akun.required'=>'Kode Akun Wajib Diisi',
        'kode_akun.numeric'=>'Kode Akun Wajib Diisi Dalam Format Angka',
        'kode_akun.unique' => 'Kode Akun Sudah Pernah Digunakan, Silahkan Pilih Kode Yang Lain',
        'nama_akun.required'=>'Nama Akun Wajib Diisi',
        'deskripsi.required'=>'Deskripsi Wajib Diisi',
        'tipe_akun.required'=>'Tipe Akun Wajib Diisi',
        'kategori_akun.required'=>'Kategori Akun Wajib Diisi',
        'level_akun.required'=>'Nomor Induk Wajib Diisi',
    ]);

    $data = [
        'kode_akun' => $request->input('kode_akun'),
        'nama_akun' => $request->input('nama_akun'),
        'deskripsi' => $request->input('deskripsi'),
        'tipe_akun' => $request->input('tipe_akun'),
        'kategori_akun' => $request->input('kategori_akun'),
        'level_akun' => $request->input('level_akun'),
        'created_at' => $request->input('created_at'),
    ];
    
    akun::create($data);
    return redirect('akun')->with('success', 'Berhasil Memasukkan Data');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = akun::where('kode_akun', $id)->first();
        return view('akun/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = akun::where('kode_akun', $id)->first(); 
        return view('akun/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_akun' => 'required',
            'deskripsi' => 'required',
            'tipe_akun' => 'required',
            'kategori_akun' => 'required',
            'level_akun' => 'required',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ], [
            'kode_akun.numeric'=>'Kode Akun Wajib Diisi Dalam Format Angka ',
            'nama_akun.required'=>'Nama Akun Wajib Diisi',
            'deskripsi.required'=>'Deskripsi Wajib Diisi',
            'tipe_akun.required'=>'Tipe Akun Wajib Diisi',
            'kategori_akun.required'=>'Kategori Akun Wajib Diisi',
            'level_akun.required'=>'Nomor Induk Wajib Diisi',
        ]);
        $data = [
            'nama_akun'=> $request->input('nama_akun'),
            'deskripsi'=> $request->input('deskripsi'),
            'tipe_akun'=> $request->input('tipe_akun'),
            'kategori_akun'=> $request->input('kategori_akun'),
            'level_akun'=> $request->input('level_akun'),
        ];
        akun::where('kode_akun', $id)->update($data);
        return redirect('/akun')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        akun::where('kode_akun', $id)->delete();
        return redirect('/akun')->with('success', 'Berhasil Hapus Data');
    }
}
