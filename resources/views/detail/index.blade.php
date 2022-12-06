@extends('obat.layout')

@section('content')

<h4 class="mt-3">Data Detail Pemesanan</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Pesan</th>
        <th>Tanggal Pesan</th>
        <th>Nama Cabang</th>
        <th>Alamat Cabang</th>
        <th>No Telepon</th>
        <th>Nama Obat</th>
        <th>Nama Admin</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_PESAN }}</td>
                <td>{{ $data->TANGGAL_PESAN }}</td>
                <td>{{ $data->NAMA_CABANG }}</td>
                <td>{{ $data->ALAMAT_CABANG }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->NAMA_OBAT }}</td>
                <td>{{ $data->nama_user }}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@stop