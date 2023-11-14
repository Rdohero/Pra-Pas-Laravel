@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Tier</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/tier" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tier" class="form-label">Tier</label>
                <input type="text" class="form-control @error('tier') is-invalid @enderror" id="tier" name="tier" required autofocus value="{{ old('tier') }}">
                @error('tier')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required autofocus hidden value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Create Tier</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })

        const title = document.querySelector('#tier');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function () {
            fetch('/tier/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
        });
    </script>
@endsection
