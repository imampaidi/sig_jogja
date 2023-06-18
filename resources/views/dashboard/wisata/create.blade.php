@extends('dashboard.layout.template')
<style>
    #mapid{
        width: 600px;
        height: 400px;
    }
    </style>
@section('content')
<section class="my-3">
    <div class="container-md">
        <div class="row bg-body">
            <a href="{{ url('dashboard/wisata') }}" class="fs-5 mb-4" style="text-decoration: none;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="col-8">
                <h2 class="mb-3">Tambah Tempat Wisata</h2>
                <form action="{{ url('dashboard/wisata') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Tempat</label>
                      <input type="text" name="nama" class="form-control" id="nama" value="{{ Session::get('nama') }}" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="selectImage" value="{{ Session::get('foto') }}">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" placeholder="tulis deskripsi disini..." id="deskripsi">{{ Session::get('deskripsi') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="tulis alamat disini..." id="alamat">{{ Session::get('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga_tiket" class="form-label">Harga Tiket</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" value="{{ Session::get('harga_tiket') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" value="{{ Session::get('latitude') }}" aria-describedby="latitude">
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" value="{{ Session::get('longitude') }}" aria-describedby="longitude">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection