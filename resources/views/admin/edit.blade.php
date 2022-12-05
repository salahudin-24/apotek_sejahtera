@extends('bunga.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Admin</h5>

		<form method="post" action="{{ route('admin.update', $data->id_user) }}">
			@csrf
            <div class="mb-3">
                <!-- <label for="id_user" class="form-label">ID User</label> -->
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $data->id_user }}" readonly="yes">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}" readonly="yes">
            </div>
			<div class="mb-3">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $data->nama_user }}">
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $data->no_telepon }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop