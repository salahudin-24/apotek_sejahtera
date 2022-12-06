<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Bunga;

class ObatController extends Controller
{
    public function create() {
        return view('obat.add');
    }
    public function store(Request $request) {
        $request->validate([
            'NAMA_OBAT' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO obat(NAMA_OBAT) 
        VALUES (:NAMA_OBAT)',[
            'NAMA_OBAT' => $request->NAMA_OBAT,]
        );
        return redirect()->route('obat.index')->with('success', 'Data Obat Disimpan');
    }
    public function index() {
        $datas = DB::table('obat')->where('isArchived','=','0')->get();
        return view('obat.index')->with('datas', $datas); 
    }
    public function edit($id) {
        $data = DB::table('obat')->where('ID_OBAT', $id)->first();
        return view('obat.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'ID_OBAT' => 'required',
        'NAMA_OBAT' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE obat SET ID_OBAT = :ID_OBAT, NAMA_OBAT = :NAMA_OBAT WHERE ID_OBAT = :id',[
        'id' => $id,
        'ID_OBAT' => $request->ID_OBAT,
        'NAMA_OBAT' => $request->NAMA_OBAT,]);
    return redirect()->route('obat.index')->with('success', 'Data Obat Diubah');
}

public function archive($id) {
    DB::update('UPDATE obat SET isArchived =1 WHERE ID_OBAT = :ID_OBAT',[
    'ID_OBAT' => $id]);
return redirect()->route('obat.index')->with('success', 'Obat diarsipkan');
}

public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM obat WHERE ID_OBAT = :ID_OBAT', ['ID_OBAT' => $id]);
    return redirect()->route('obat.index')->with('success', 'Data Obat Dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('obat')->where('NAMA_OBAT', 'LIKE', '%' . $request->search  .'%')->where('isArchived','=','0')->get();
    }else{
        $datas = DB::table('obat')->where('isArchived','=','0')->get();
    }
    return view('obat.index')->with('datas', $datas); 
}
}