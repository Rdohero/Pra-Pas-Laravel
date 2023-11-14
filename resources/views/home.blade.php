@extends('layouts.main')
@section('container')
    <div class="mt-4 m-md-4">
        <h1 class="mb-3 text-center">{{ $title }}</h1>

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(strlen($tier))
            <h5 class="text-center mb-4">{!! $tier->deskripsi !!}</h5>
        @else
            <div></div>
        @endif
        @if($characters->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="col-1">Image</th>
                        <th scope="col" class="col-1">Tier</th>
                        <th scope="col" class="col-1">Name</th>
                        <th scope="col" class="col-1">Origin</th>
                        <th scope="col" class="col-1">Gender</th>
                        <th scope="col" class="col-2">Age</th>
                        <th scope="col" class="col-2">Classification</th>
                        <th scope="col" class="col-5">Deskripsi</th>
                        <th scope="col" class="col-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center align-text-bottom">
                    @foreach($characters as $character)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>
                                @if($character->image)
                                    <img src="{{ asset('storage/' . $character->image) }}" width="400" height="400" class="img-thumbnail rounded-circle" alt="{{ $character->name }}">
                                @else
                                    <img src="https://source.unsplash.com/400x400/?{{ $character->name }}" width="400" height="400" class="img-thumbnail rounded-circle" alt="{{ $character->name }}">
                                @endif
                            </th>
                            <td>{{ $character->tier->tier }}</td>
                            <td>{{ $character->name }}</td>
                            <td>{{ $character->origin->origin }}</td>
                            <td>{{ Str::limit($character->gender,50) }}</td>
                            <td>{{ Str::limit($character->age, 50) }}</td>
                            <td>{{ Str::limit($character->classification,50) }}</td>
                            <td>{!! Str::limit($character->deskripsi, 100) !!}</td>
                            <td class="text-nowrap">
                                <button type="button" class="badge btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $character->id }}" data-bs-whatever="@mdo"><span data-feather="file"></span></button>
                                <a href="/home/{{ $character->id }}" class="badge bg-info "><span data-feather="eye"></span></a>
                                <a href="/home/{{ $character->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/home/{{ $character->id }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $character->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Image :</label>
                                                <input type="hidden" name="oldImage" value="{{ $character->image }}">
                                                @if($character->image)
                                                    <img src="{{ asset('storage/'. $character->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @else
                                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Tier :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->tier->tier }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nama :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Origin :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->origin->origin }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Gender :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->gender }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Age :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->age }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Classification :</label>
                                                <input type="text" class="form-control" id="recipient-name" value="{{ $character->classification }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                                                <div>{!! $character->deskripsi !!}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="text-center">
                <p class="text-center fs-4">No Characther found.</p>
                <a href="/home/create" class="btn btn-primary mb-3">Create New Character</a>
            </div>
        @endif
        </div>
@endsection
