@extends('dashboard.layout.template')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tempat Wisata</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a type="button" href="{{ url('dashboard/wisata/create') }}" class="btn btn btn-outline-success">Tambah Data</a>
    </div>
</div>
<div class="row gy-4">
    <div class="col-12">
        <form class="d-flex" action="{{ url('dashboard/wisata') }}" method="get">
            <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    @include('dashboard.components.alert')
    <div class="col-12">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="col">NO</th>
                    <th class="col">NAMA TEMPAT</th>
                    <th class="col">FOTO</th>
                    <th class="col">DESKRIPSI</th>
                    <th class="col">ALAMAT</th>
                    <th class="col">HARGA TIKET</th>
                    <th class="col">LATITUDE</th>
                    <th class="col">LONGITUDE</th>
                    <th class="col" style="width: 12%;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem() ?>
                @foreach ($data as $item)  
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ url('foto'.'/'.$item->foto)}}" alt="Foto Tempat Wisata" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>{!!Str::limit(strip_tags($item->deskripsi), 24)!!}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>Rp {{ $item->harga_tiket }}</td>
                    <td>{{ $item->latitude }}</td>
                    <td>{{ $item->longitude }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ url('wisata/'.$item->id)}}" target="_blank"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-sm btn-warning" href="{{ url('dashboard/wisata/'.$item->id.'/'.'edit/')}}"><i class="bi bi-pencil-square"></i></a>
            
                        <form onsubmit="return confirm('yakin mau hapus?')" class="d-inline" action="{{ url('dashboard/wisata/'.$item->id)}}" method="post">
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                    </td>    
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
</div>
@endsection