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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Cabang</h5>

		<form method="post" action="{{ route('cabang.update', $data->ID_CABANG) }}">
			@csrf
            <div class="mb-3">
                <!--<label for="ID_CABANG" class="form-label">ID Cabang</label> -->
                <input type="hidden" class="form-control" id="ID_CABANG" name="ID_CABANG" value="{{ $data->ID_CABANG }}">
            </div>
			<div class="mb-3">
                <label for="NAMA_CABANG" class="form-label">Nama Cabang</label>
                <input type="text" class="form-control" id="NAMA_CABANG" name="NAMA_CABANG" value="{{ $data->NAMA_CABANG }}">
            </div>
            <div class="mb-3">
                <label for="NO_TELEPON" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="NO_TELEPON" name="NO_TELEPON" value="{{ $data->NO_TELEPON }}">
            </div>
            <div class="mb-3">
                <label for="ALAMAT_CABANG" class="form-label">Alamat Cabang</label>
                <input type="text" class="form-control" id="ALAMAT_CABANG" name="ALAMAT_CABANG" value="{{ $data->ALAMAT_CABANG }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop