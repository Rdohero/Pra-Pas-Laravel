@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $title }}</h1>

                <a href="/media" class="btn btn-success"><span data-feather="arrow-left"></span> Back </a>

                <h3 class="my-3 fs-5">
                    Media : {{ $media->media }}
                </h3>
                <h3 class="my-3 fs-5">
                    Banyak Yang menggunakan media : {{ $media->total }}
                </h3>
                <h3 class="my-3 fs-5">
                    Tanggal Media Dibuat : {{ $media->tgl_dibuat }}
                </h3>
                <article class="my-3 fs-5">
                    {!! $media->deskripsi !!}
                </article>
            </div>
        </div>
    </div>
@endsection
