@extends('obat.layout')

@section('content')

<h4 class="mt-3">Data Member</h4>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="GET" action="/member.search">        
        @csrf
        <div class="input-group mb-3">
            <input type="search" name="search" class="form-control" placeholder="Cari Nama Member">
                <button type="submit" class="btn btn-danger">
                    <i class="fas">Search</i>
                </button>
            </div>
        </form>
    </div>
</div>

<a href="{{ route('member.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Member</th>
        <th>No Telepon</th>
        <th>Alamat Member</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_MEMBER }}</td>
                <td>{{ $data->NAMA_MEMBER }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->ALAMAT_MEMBER }}</td>
                <td>                    
                    <a href="{{ route('member.edit', $data->ID_MEMBER) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>


                    <!-- Button trigger modal Arsipkan -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#arsipModal{{ $data->ID_MEMBER }}">
                        Arsipkan
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="arsipModal{{ $data->ID_MEMBER }}" tabindex="-1" aria-labelledby="arsipModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="arsipModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('member.archive', $data->ID_MEMBER) }}">
                                        @csrf
                                        <div class="modal-body">
                                            Apakah anda yakin mengarsipkan member ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Modal -->

                    <!-- Button trigger modal Hapus -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_MEMBER }}">
                        Hapus
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="hapusModal{{ $data->ID_MEMBER }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('member.delete', $data->ID_MEMBER) }}">
                                        @csrf
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Modal -->
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@stop