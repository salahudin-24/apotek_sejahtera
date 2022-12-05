<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create() {
        return view('admin.add');
    }
    public function store(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_user' => 'required',
            'no_telepon' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO users(username, password, nama_user, no_telepon) 
            VALUES (:username, :password, :nama_user, :no_telepon)',[
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_user' => $request->nama_user,
            'no_telepon' => $request->no_telepon,]
        );
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }
    public function index() {
        $datas = DB::select('select * from users');
        return view('admin.index')->with('datas', $datas);
    }
    public function edit($id) {
        $data = DB::table('users')->where('id_user', $id)->first();
        return view('admin.edit')->with('data', $data);
    }
    public function update($id, Request $request) {
        $request->validate([
        'id_user' => 'required',
        'nama_user' => 'required',
        'no_telepon' => 'required',]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::update('UPDATE users SET id_user = :id_user, nama_user = :nama_user, no_telepon = :no_telepon WHERE id_user = :id',[
        'id' => $id,
        'id_user' => $request->id_user,
        'nama_user' => $request->nama_user,
        'no_telepon' => $request->no_telepon,]);
    return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
}
public function delete($id) {
// Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
    DB::delete('DELETE FROM users WHERE id_user = :id_user', ['id_user' => $id]);
    return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
}

public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('users')->where('id_user', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from users');
    }
    return view('admin.index')->with('datas', $datas); 
}
}