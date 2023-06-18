@extends('layout.template')
@section('content')
@include('layout.partials.header')
<section class="container-md py-5">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3">
        @foreach ($data as $item)
            <div class="col">
                <a href="{{ url('wisata/'.$item->id) }}" class="card shadow text-decoration-none h-100">
                    <img src="{{ url('foto'.'/'.$item->foto)}}" class="card-img-top" alt="Bootstrap Themes" style="object-fit: cover;" width="100%" height="225" role="img" loading="lazy">
                    <div class="card-body p-4">
                        <h3 class="fs-4">{{ $item->nama }}</h3>
                        <p class="card-text line-clamp text-muted">{!!Str::limit(strip_tags($item->deskripsi), 110)!!}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
@endsection