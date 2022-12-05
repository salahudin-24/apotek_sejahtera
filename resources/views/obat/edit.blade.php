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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Obat</h5>

		<form method="post" action="{{ route('obat.update', $data->ID_OBAT) }}">
			@csrf
            <div class="mb-3">
                <!-- <label for="ID_OBAT" class="form-label">ID Bunga</label> -->
                <input type="hidden" class="form-control" id="ID_OBAT" name="ID_OBAT" value="{{ $data->ID_OBAT }}">
            </div>
			<div class="mb-3">
                <label for="NAMA_OBAT" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="NAMA_OBAT" name="NAMA_OBAT" value="{{ $data->NAMA_OBAT }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop