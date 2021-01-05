<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class BarangController extends Controller
{
    function read() {

        $barang = Barang::all();

        return response()->json($barang, 200);
    }

    function store(Request $request) {

        $this->validate($request, [
            'kode_barang'=>'required',
            'nama_barang'=>'required',
            'jumlah_barang'=>'required'
        ]);

        Barang::create([
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'jumlah_barang'=>$request->jumlah_barang
        ]);
        return response()->json([
            'response'=>'Ok',
            'message'=>'Data berhasil disimpan'
        ], 200);
    }

    function update(Request $request, $id) {
        $check = Barang::firstWhere('kode_barang', $id);

        if ($check) {

            $this->validate($request, [
                'kode_barang'=>$request->kode_barang,
                'nama_barang'=>$request->nama_barang,
                'jumlah_barang'=>$request->jumlah_barang
            ]);

            $barang = Barang::find($id);
            $barang->kode_barang=$request->kode_barang;
            $barang->nama_barang=$request->nama_barang;
            $barang->jumlah_barang=$request->jumlah_barang;
            $barang->save();

            return response([
                'status'=>'Ok',
                'message'=>'Data berhasil diubah',
                'data'=>$barang
            ], 200);

        } else {

            return response([
                'status'=>'Not Found',
                'message'=>'Data tidak ditemukan'
            ], 400);
        }

    }

    function delete($id) {

        $barang = Barang::find($id);
        if ($barang) {

            return response([
                'status'=>'Ok',
                'message'=>'Data berhasil dihapus',
            ], 200);

        } else {

            return response([
                'status'=>'Not Found',
                'message'=>'Data tidak ditemukan'
            ], 400);
        }
    }

}
