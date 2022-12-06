<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DetailController extends Controller
{
    public function index() {
        $datas = DB::table('pemesanan')
        ->leftJoin('obat', 'pemesanan.ID_OBAT', '=', 'obat.ID_OBAT')
        ->leftJoin('cabang', 'pemesanan.ID_CABANG', '=', 'cabang.ID_CABANG')
        ->leftJoin('users', 'pemesanan.id_user', '=', 'users.id_user')
        ->select('pemesanan.ID_PESAN', 'pemesanan.TANGGAL_PESAN', 'cabang.NAMA_CABANG', 'cabang.ALAMAT_CABANG', 'cabang.NO_TELEPON', 'obat.NAMA_OBAT', 'users.nama_user')
        ->get();
        return view('detail.index')->with('datas', $datas);
    }
}