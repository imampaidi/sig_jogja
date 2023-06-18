@extends('layout.template')
@section('content')
<style>
    #map { 
        height: 480px; 
    }

    .leaflet-popup {
        bottom: 10px !important;
    }
</style>
@include('layout.partials.header')
<section class="container-md">
    <div class="row flex-lg-row align-items-center gy-3 py-5">
        <div class="col-12 col-sm-8 col-lg-6">
            <h2 class="display-6 fw-bold mb-3">{{ $data->nama }}</h2>
            <p class="lead fw-normal">{{ $data->deskripsi }}</p>
            <p class="lead fw-normal">Alamat : Rp {{ $data->alamat }}</p>
            <p class="lead fw-normal">Harga Tiket :
                @if ( $data->harga_tiket == 0)
                    Gratis
                @else
                    Rp {{ $data->harga_tiket }}
                @endif
            </p>
            <img class="rounded" src="{{ url('foto'.'/'.$data->foto)}}" alt="Foto Tempat Wisata" style="max-width: 240px;">
        </div>
        <div class="col-12 col-sm-8 col-lg-6">
            {{-- <img src="{{ url('foto'.'/'.$data->foto)}}" alt="Foto Tempat Wisata" style="width: 100%;"> --}}
            <div class="rounded mb-3" id="map"></div>
            <p class="lead d-inline">Latitude: {{ $data->latitude }}</p>
            &nbsp;&nbsp;
            <p class="lead d-inline">Longitude: {{ $data->longitude }}</p>
        </div>
    </div>
</section>
<script>
    let map = L.map('map').setView([{{  $data->latitude }}, {{  $data->longitude }}], 15);
    let marker = L.marker([{{  $data->latitude }}, {{  $data->longitude }}]).addTo(map);
    marker.bindPopup("<b>{{ $data->nama }}</b>").openPopup();
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>
@endsection