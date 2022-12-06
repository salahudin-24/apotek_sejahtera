@extends('obat.layout')

@section('content')

<h4 class="mt-3">Data Obat</h4>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="GET" action="/obat.search">        
        @csrf
        <div class="input-group mb-3">
            <input type="search" name="search" class="form-control" placeholder="Cari obat">
                <button type="submit" class="btn btn-danger">
                    <i class="fas">Search</i>
                </button>
            </div>
        </form>
    </div>
</div>

<a href="{{ route('obat.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Obat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_OBAT }}</td>
                <td>{{ $data->NAMA_OBAT }}</td>
                <td>
                    <a href="{{ route('obat.edit', $data->ID_OBAT) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal arsipkan-->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#archiveModal{{ $data->ID_OBAT }}">
                        Arsipkan
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="archiveModal{{ $data->ID_OBAT }}" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="archiveModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('obat.archive', $data->ID_OBAT) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin mengarsipkan obat ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Button trigger modal hapus-->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_OBAT }}">
                        Hapus
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->ID_OBAT }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('obat.delete', $data->ID_OBAT) }}">
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
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
  
@stop