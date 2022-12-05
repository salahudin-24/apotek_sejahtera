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

        <h5 class="card-title fw-bolder mb-3">Tambah Data Obat</h5>

		<form method="post" action="{{ route('obat.store') }}">
			@csrf

			<div class="mb-3">
                <label for="NAMA_OBAT" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="NAMA_OBAT" name="NAMA_OBAT">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
	</div>
</div>

@stop