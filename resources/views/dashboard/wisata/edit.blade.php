@extends('dashboard.layout.template')
<style>
    #map { 
        height: 300px; 
    }

    .leaflet-popup {
        bottom: 10px !important;
    }
</style>
@section('content')
<section class="my-3">
    <div class="container-md">
        <div class="row">
            <a href="{{ url('dashboard/wisata') }}" class="fs-5 mb-4" style="text-decoration: none;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="col-8">
                <h2 class="mb-3">Tambah Tempat Wisata</h2>
                    <form class="row" action="{{ url('dashboard/wisata/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" class="form-control" id="id" value="{{ $data->id }}" aria-describedby="id">
                        <div class="col-12 mb-2">
                            <label for="nama" class="form-label">Nama Tempat</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $data->nama }}" aria-describedby="nama">
                        </div>
                        @if ($data->foto)
                        <div class="col-4 mb-2">
                            <img class="rounded" src="{{ url('foto').'/'.$data->foto }}" alt="Foto Tempat Wisata" style="max-width:100%;">
                        </div>
                        @endif
                        <div class="col-12 mb-2">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                        </div>
                        <div class="col-12 mb-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="tulis deskripsi disini..." id="deskripsi"> {{ $data->deskripsi }}</textarea>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="tulis alamat disini..." id="alamat"> {{ $data->alamat }}</textarea>
                        </div>
                        <div class="col-4 mb-2">
                            <label for="harga_tiket" class="form-label">Harga Tiket</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" value="{{ $data->harga_tiket }}" required>
                            </div>
                        </div>
                        <div class="col-4 mb-2">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" name="latitude" class="form-control" id="latitude" value="{{ $data->latitude }}" aria-describedby="latitude">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" class="form-control" id="longitude" value="{{ $data->longitude }}" aria-describedby="longitude">
                        </div>
                        <div class="col-12 mb-2 overflow-hidden">
                            <div class="rounded mb-3" id="map"></div>
                            {{-- <iframe class="rounded" width="100%" 
                            height="300" src="https://maps.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}&hl=es;z=20&amp;output=embed"></iframe> --}}
                        </div>
                        <div class="col-12 mb-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
<script>
    let map = L.map('map').setView([{{  $data->latitude }}, {{  $data->longitude }}], 15);
    let marker = L.marker([{{  $data->latitude }}, {{  $data->longitude }}]).addTo(map);
    // let marker = L.marker([-7.3237089, 109.1791946]).addTo(map);
    // let marker2 = L.marker([-7.3139534, 109.1837141]).addTo(map);
    marker.bindPopup("<b>{{ $data->nama }}</b>").openPopup();
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>
@endsection