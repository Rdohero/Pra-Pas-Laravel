@extends('layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Character</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/home" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Characters Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tier" class="form-label">Tier</label>
                <select class="form-select" name="tier_id">
                    <option selected>Open this select menu</option>
                    @foreach($tiers as $tier)
                        @if(old('tier_id') == $tier->id)
                            <option value="{{ $tier->id }}" selected>{{ $tier->tier }}</option>
                        @else
                            <option value="{{ $tier->id }}">{{ $tier->tier }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="origin" class="form-label">Origin</label>
                <select class="form-select" name="origin_id">
                    <option selected>Open this select menu</option>
                    @foreach($origins as $origin)
                        @if(old('origin_id') == $origin->id)
                            <option value="{{ $origin->id }}" selected>{{ $origin->origin }}</option>
                        @else
                            <option value="{{ $origin->id }}">{{ $origin->origin }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender') }}">
                @error('gender')
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
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" required autofocus value="{{ old('age') }}">
                @error('age')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="classification" class="form-label">Classification</label>
                <input type="text" class="form-control @error('classification') is-invalid @enderror" id="classification" name="classification" required autofocus value="{{ old('classification') }}">
                @error('classification')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Character</button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        document.addEventListener('trix-file-accept', function (e) {
            e.preventDefault();
        })
    </script>
@endsection
