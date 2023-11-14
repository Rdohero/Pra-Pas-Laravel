@extends('layouts.main')

@section('container')
    <h1 class="text-center d-block mt-3 pb-4">Tier Categories</h1>

    <div class="container">
        <div class="row">
            @foreach($tiers as $tier)
            <div class="col-md-4">
                <a href="/home?tier={{ $tier->id }}" class="text-decoration-none text-white">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x500/?multiverse" class="card-img" alt="{{ $tier->tier }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $tier->tier }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
