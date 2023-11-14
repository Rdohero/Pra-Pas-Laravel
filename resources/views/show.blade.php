@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $title }}</h1>

                <a href="/home" class="btn btn-success"><span data-feather="arrow-left"></span> Back </a>
                <a href="/home/{{ $character->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/home/{{ $character->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>
                <h3 class="my-3 fs-5">
                    Tier : {{ $character->tier->tier }}
                </h3>
                <h3 class="my-3 fs-5">
                    Name : {{ $character->name }}
                </h3>
                <h3 class="my-3 fs-5">
                    Origin : {{ $character->origin->origin }}
                </h3>
                <h3 class="my-3 fs-5">
                    Gender : {{ $character->gender }}
                </h3>
                <h3 class="my-3 fs-5">
                    Age : {{ $character->age }}
                </h3>
                <h3 class="my-3 fs-5">
                    Classification : {{ $character->classification }}
                </h3>
                <article class="my-3 fs-5">
                    {!! $character->deskripsi !!}
                </article>
            </div>
        </div>
    </div>
@endsection
