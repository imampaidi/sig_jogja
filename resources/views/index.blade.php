@extends('layout.template')
@section('content')
<style>
    section, .row {
        min-height: 100vh;
    }

    .hero {
        position: relative;
        background-image: url('images/home.png');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        z-index: 1;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Nilai 0.5 adalah tingkat opasitas, sesuaikan jika diperlukan */
        z-index: -1;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
    }

    .grid-item {
      position: relative;
      overflow: hidden;
    }

    .grid-item img {
      display: block;
      width: 100%;
      height: 400px;
    }

    .grid-item .image-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
      text-align: center;
      padding: 10px;
    }

    .grid-item:hover .image-overlay {
      opacity: 1;
    }

        

    #map { 
        height: 500px; 
    }
</style>
<section class="bg-dark text-white hero">
    @include('layout.partials.header')
    <div class="container-md d-flex justify-content-center align-items-center flex-column">
        <span class="display-6 lh-1 text-center mb-3" style="color:white">SISTEM INFORMASI GEOGRAFIS WISATA</span>
        <h1 class="display-2 fw-bold text-body-emphasis lh-1 mb-3 text-center"style="color:white">DAERAH ISTIMEWA YOGYAKARTA</h1>
        <p class="lead fw-normal text-center"style="color:white">Aplikasi sistem informasi ini untuk pemetaan geografis tempat wisata di Yogyakarta. Aplikasi ini berisi informasi dan lokasi dari semua objek wisata tersebut. </p>
    </div>
</section>
<section class="container-md"> 
    <div class="row flex-lg-row-reverse align-items-center gy-3 py-5">
        <div class="col-12 col-sm-8 col-lg-6">
            <div class="rounded" id="map"></div>
        </div>
        <div class="col-lg-6">
            <h2 class="display-4 fw-bold lh-1 mb-3">JANGKAUAN PETA</h2>
            <p class="lead fw-normal">Ruang lingkup Peta Sistem Informasi Geografis Tempat Wisata di Yogyakarta mengacu pada wilayah yang dicakup oleh peta, yang mencakup seluruh wilayah metropolitan Yogyakarta.</p>
            <p class="lead fw-normal">Jumlah Tempat Wisata : <span class="fw-bold">{{ $total }}</span></p>
        </div>
      </div>
</section>


{{-- <section class="container-md py-5">
<div class="grid-container">
    <div class="grid-item">
      <img src="foto/wisata1.png" alt="Gambar 1">
      <div class="image-overlay">
      Candi Borobudur
      </div>
    </div>
    <div class="grid-item">
      <img src="foto/wisata2.png" alt="Gambar 2">
      <div class="image-overlay">
      Kraton Yogyakarta
      </div>
    </div>
    <div class="grid-item">
      <img src="foto/wisata3.png" alt="Gambar 3">
      <div class="image-overlay">
      Pantai Parangtritis
      </div>
    </div>
    <div class="grid-item">
      <img src="foto/wisata4.png" alt="Gambar 3">
      <div class="image-overlay">
      Taman Sari
      </div>
    </div>
    <div class="grid-item">
      <img src="foto/wisata5.png" alt="Gambar 3">
      <div class="image-overlay">
      Pantai Indrayanti
      </div>
    </div>
    <div class="grid-item">
      <img src="foto/wisata6.png" alt="Gambar 3">
      <div class="image-overlay">
      Candi Prambanan
      </div>
    </div>
    <!-- Tambahkan grid-item dan image-overlay lainnya di sini -->
  </div>
  </section>--}}


{{-- <section class="container-md py-5" style="min-height: 100vh;">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">SISTEM INFORMASI GEOGRAFIS WISATA BANYUMAS</h1>
          <p class="col-lg-10 fs-4">Sistem Informasi ini merupakan aplikasi pemetaan geografis tempat wisata di wilayah</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="rounded" id="map"></div>
        </div>
    </div>
</section> --}}

{{-- <section class="container-md py-5">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3">
        @foreach ($data as $item)
            <div class="col">
                <a href="{{ url('/'.$item->id) }}" class="card shadow-lg text-decoration-none h-100">
                    <img src="{{ url('foto'.'/'.$item->foto)}}" class="card-img-top" alt="Bootstrap Themes" style="object-fit: cover;" width="100%" height="225" role="img" loading="lazy">
                    <div class="card-body p-4">
                        <h3 class="fs-4">{{ $item->nama }}</h3>
                        <p class="card-text line-clamp text-muted">{!!Str::limit(strip_tags($item->deskripsi), 110)!!}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section> --}}


<script>
    let map = L.map('map').setView([-7.801141, 110.364678], 10);
    @foreach ($data as $item)
    let marker{{ $item->id }} = L.marker([{{  $item->latitude }}, {{  $item->longitude }}]).addTo(map);
    @endforeach
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>  
@endsection

