@extends('layouts.main')
@section('container')
    <div class="container mt-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Origin</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/origin" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="origin" class="form-label">Origin</label>
                <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin" required autofocus value="{{ old('origin') }}">
                @error('origin')
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
            <button type="submit" class="btn btn-primary">Create Origin</button>
        </form>
    </div>
    </div>
    <script>
        const title = document.querySelector('#origin');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function () {
            fetch('/tier/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
        });
    </script>
@endsection
