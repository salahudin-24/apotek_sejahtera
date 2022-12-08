@extends('obat.layout')

@section('content')

<h4 class="mt-3">Data Cabang</h4>



<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="GET" action="/cabang.search_archived">        
        @csrf
        <div class="input-group mb-3">
            <input type="search" name="search_archived" class="form-control" placeholder="Cari Nama Cabang">
                <button type="submit" class="btn btn-danger">
                    <i class="fas">Search</i>
                </button>
            </div>
        </form>
    </div>
</div>

<a href="{{ route('cabang.index') }}" type="button" class="btn btn-warning rounded-3">Lihat Cabang Aktif</a>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Cabang</th>
        <th>No Telepon</th>
        <th>Alamat Cabang</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_CABANG }}</td>
                <td>{{ $data->NAMA_CABANG }}</td>
                <td>{{ $data->NO_TELEPON }}</td>
                <td>{{ $data->ALAMAT_CABANG }}</td>
                <td>                    


                    <!-- Button trigger modal Kembalikan -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#recoverModal{{ $data->ID_CABANG }}">
                        Kembalikan
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="recoverModal{{ $data->ID_CABANG }}" tabindex="-1" aria-labelledby="recoverpModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="recoverModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('cabang.recover', $data->ID_CABANG) }}">
                                        @csrf
                                        <div class="modal-body">
                                            Apakah anda yakin Mengembalikan cabang ini?
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_CABANG }}">
                        Hapus
                    </button>
                    <!-- Modal -->
                        <div class="modal fade" id="hapusModal{{ $data->ID_CABANG }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('cabang.delete_archived', $data->ID_CABANG) }}">
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