<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CabangController extends Controller
{
    public function create() {
        return view('cabang.add');
    }
    public function store(Request $request) {
        $request->validate([
            'NAMA_CABANG' => 'required',
            'NO_TELEPON' => 'required',
            'ALAMAT_CABANG' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO cabang(NAMA_CABANG, NO_TELEPON, ALAMAT_CABANG) 
            VALUES (:NAMA_CABANG, :NO_TELEPON, :ALAMAT_CABANG)',[
            'NAMA_CABANG' => $request->NAMA_CABANG,
            'NO_TELEPON' => $request->NO_TELEPON,
            'ALAMAT_CABANG' => $request->ALAMAT_CABANG,]
        );
        return redirect()->route('cabang.index')->with('success', 'Data Cabang berhasil disimpan');
    }
    public function index() {
        $datas = DB::table('cabang')->where('isArchived','=','0')->get();
        return view('cabang.index')->with('datas', $datas);
    }

    public function archived() {
        $datas = DB::table('cabang')->where('isArchived','=','1')->get();
        return view('cabang.archived')->with('datas', $datas);
    }

    
    public function edit($id) {
        $data = DB::table('cabang')->where('ID_CABANG', $id)->first();
        return view('cabang.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_CABANG' => 'required',
        'NAMA_CABANG' => 'required',
        'NO_TELEPON' => 'required',
        'ALAMAT_CABANG' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE cabang SET ID_CABANG = :ID_CABANG, NAMA_CABANG = :NAMA_CABANG, NO_TELEPON = :NO_TELEPON, ALAMAT_CABANG = :ALAMAT_CABANG WHERE ID_CABANG = :id',[
        'id' => $id,
        'ID_CABANG' => $request->ID_CABANG,
        'NAMA_CABANG' => $request->NAMA_CABANG,
        'NO_TELEPON' => $request->NO_TELEPON,
        'ALAMAT_CABANG' => $request->ALAMAT_CABANG,]);
    return redirect()->route('cabang.index')->with('success', 'Data Cabang berhasil diubah');
}

    public function archive($id) {
        DB::update('UPDATE cabang SET isArchived =1 WHERE ID_CABANG = :ID_CABANG',[
        'ID_CABANG' => $id]);
    return redirect()->route('cabang.index')->with('success', 'Cabang diarsipkan');
    }

    public function recover($id) {
        DB::update('UPDATE cabang SET isArchived =0 WHERE ID_CABANG = :ID_CABANG',[
        'ID_CABANG' => $id]);
    return redirect()->route('cabang.archived')->with('success', 'Cabang Dikembalikan');
    }

    public function delete($id) {
    // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM cabang WHERE ID_CABANG = :ID_CABANG', ['ID_CABANG' => $id]);
        return redirect()->route('cabang.index')->with('success', 'Data Cabang berhasil dihapus');
    }


    public function delete_archived($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::delete('DELETE FROM cabang WHERE ID_CABANG = :ID_CABANG', ['ID_CABANG' => $id]);
            return redirect()->route('cabang.archived')->with('success', 'Data Cabang berhasil dihapus');
        }

    public function search(Request $request) {
        if($request->has('search')){
            $datas = DB::table('cabang')->where('NAMA_CABANG', 'LIKE', '%' . $request->search  .'%')->where('isArchived','=','0')->get();
        }else{
            $datas = DB::table('cabang')->where('isArchived','=','0')->get();
        }
        return view('cabang.index')->with('datas', $datas); 
    }

    public function search_archived(Request $request) {
        if($request->has('search_archived')){
            $datas = DB::table('cabang')->where('NAMA_CABANG', 'LIKE', '%' . $request->search_archived  .'%')->where('isArchived','=','1')->get();
        }else{
            $datas = DB::table('cabang')->where('isArchived','=','1')->get();
        }
        return view('cabang.archived')->with('datas', $datas); 
    }
}