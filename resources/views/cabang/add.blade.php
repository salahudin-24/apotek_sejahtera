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

        <h5 class="card-title fw-bolder mb-3">Tambah Data Cabang</h5>

		<form method="post" action="{{ route('cabang.store') }}">
			@csrf
			<div class="mb-3">
                <label for="NAMA_CABANG" class="form-label">Nama Cabang</label>
                <input type="text" class="form-control" id="NAMA_CABANG" name="NAMA_CABANG">
            </div>
            <div class="mb-3">
                <label for="NO_TELEPON" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="NO_TELEPON" name="NO_TELEPON">
            </div>
            <div class="mb-3">
                <label for="ALAMAT_CABANG" class="form-label">Alamat Cabang</label>
                <input type="text" class="form-control" id="ALAMAT_CABANG" name="ALAMAT_CABANG">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
	</div>
</div>

@stop