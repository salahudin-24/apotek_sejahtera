@extends('obat.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Data Pemesanan</h5>

		<form method="post" action="{{ route('pemesanan.store') }}">
			@csrf
			<div class="mb-3">
                <label for="TANGGAL_PESAN" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="TANGGAL_PESAN" name="TANGGAL_PESAN">
            </div>
            <div class="mb-3">
                <label for="ID_CABANG" class="form-label">ID Cabang</label>
                <input type="text" class="form-control" id="ID_CABANG" name="ID_CABANG">
            </div>
            <div class="mb-3">
                <label for="ID_OBAT" class="form-label">ID Obat</label>
                <input type="text" class="form-control" id="ID_OBAT" name="ID_OBAT">
            </div>
            <div class="mb-3">
                <label for="id_user" class="form-label">ID Admin</label>
                <input type="text" class="form-control" id="id_user" name="id_user">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
	</div>
</div>

@stop