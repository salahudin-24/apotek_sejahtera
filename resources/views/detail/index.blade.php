@extends('obat.layout')

@section('content')

<h4 class="mt-3">Data Detail Pemesanan</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Pesan</th>
        <th>Tanggal Pesan</th>
        <th>Nama Member</th>
        <th>Alamat Member</th>
        <th>No Telepon</th>
        <th>Nama Obat</th>
        <th>Nama User</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_PESAN }}</td>
                <td>{{ $data->TANGGAL_PESAN }}</td>
                <td>{{ $data->NAMA_MEMBER }}</td>
                <td>{{ $data->ALAMAT_MEMBER }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->NAMA_OBAT }}</td>
                <td>{{ $data->nama_user }}</td>
            </tr>
            @endforeach
    </tbody>
</table>
@stop