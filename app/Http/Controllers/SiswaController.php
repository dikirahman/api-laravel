<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Http\Resources\SiswaResource;


class SiswaController extends Controller
{
    //
    public function index()
    {
        //get data from table siswas
        return Siswa::all();
    }
    public function show($id)
    {
        return Siswa::findOrfail($id);
    }

    public function store(request $request)
    {
       $input = $request->all();
       $siswa = Siswa::create($input);
       
       return new SiswaResource($siswa);
    }
    public function update(request $request, $id)
    {
        $nama = $request->nama;
        $alamat = $request->alamat;

        $siswa = Siswa::find($id);
        $siswa->nama = $nama;
        $siswa->alamat = $alamat;
        $siswa->save();

        return "Data Berhasil di Update";
    }
    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return "Data Berhasil di Hapus";
    }

}
