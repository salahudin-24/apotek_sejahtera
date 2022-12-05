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
        ->leftJoin('bunga', 'pemesanan.ID_BUNGA', '=', 'bunga.ID_BUNGA')
        ->leftJoin('member', 'pemesanan.ID_MEMBER', '=', 'member.ID_MEMBER')
        ->leftJoin('users', 'pemesanan.id_user', '=', 'users.id_user')
        ->select('pemesanan.ID_PESAN', 'pemesanan.TANGGAL_PESAN', 'member.NAMA_MEMBER', 'member.ALAMAT_MEMBER', 'member.NO_TELEPON', 'bunga.NAMA_BUNGA', 'users.nama_user')
        ->get();
        return view('detail.index')->with('datas', $datas);
    }
}