<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PemesananController extends Controller
{
    public function create() {
        $cabangs = DB::select('select * from cabang');
        $users = DB::select('select * from users');
        $obats = DB::select('select * from obat');
        return view('pemesanan.add')->with('cabangs',$cabangs)->with('users',$users)->with('obats',$obats);
    }
    public function store(Request $request) {
        $request->validate([
            'TANGGAL_PESAN' => 'required',
            'ID_OBAT' => 'required',
            'ID_CABANG' => 'required',
            'id_user' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pemesanan(TANGGAL_PESAN, ID_OBAT, ID_Cabang, id_user) 
            VALUES (:TANGGAL_PESAN, :ID_OBAT, :ID_CABANG, :id_user)',[
            'TANGGAL_PESAN' => $request->TANGGAL_PESAN,
            'ID_OBAT' => $request->ID_OBAT,
            'ID_CABANG' => $request->ID_CABANG,
            'id_user' => $request->id_user,]
        );
        return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan Disimpan');
    }
    public function index() {
        $datas = DB::select('select * from pemesanan');
        return view('pemesanan.index')->with('datas', $datas);
    }


    public function edit($id) {
        $data = DB::table('pemesanan')->where('ID_PESAN', $id)->first();
        return view('pemesanan.edit')->with('data', $data)->with("cabangs", $cabangs);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_PESAN' => 'required',
        'TANGGAL_PESAN' => 'required',
        'ID_OBAT' => 'required',
        'ID_CABANG' => 'required',
        'id_user' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE pemesanan SET ID_PESAN = :ID_PESAN, TANGGAL_PESAN = :TANGGAL_PESAN, ID_OBAT = :ID_OBAT, ID_CABANG = :ID_CABANG, id_user = :id_user WHERE ID_PESAN = :id',[
        'id' => $id,
        'ID_PESAN' => $request->ID_PESAN,
        'TANGGAL_PESAN' => $request->TANGGAL_PESAN,
        'ID_OBAT' => $request->ID_OBAT,
        'ID_CABANG' => $request->ID_CABANG,
        'id_user' => $request->id_user,]);
    return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan Diubah');
}
public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM pemesanan WHERE ID_PESAN = :ID_PESAN', ['ID_PESAN' => $id]);
    return redirect()->route('pemesanan.index')->with('success', 'Data Pemesanan Dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('pemesanan')->where('ID_PESAN', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from pemesanan');
    }
    return view('pemesanan.index')->with('datas', $datas); 
}
}