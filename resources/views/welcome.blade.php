@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($buku as $b)
        <div class="col-md-3 mt-3">
            <div class="card">
                @if(Storage::disk('local')->exists('public/buku/'.$b->cover))
                <img src="{{ asset('storage/buku/'.$b->cover) }}" alt="Cover Image" class="img-fluid img-thumbnail">
                    @else
                    <span class="text-danger">Cover tidak ada</span>
                        @endif
                            <div class="card-body">
                    <h5 class="card-title"><strong>Judul : </strong>{{ $b->judul }}</h5>
                    <p class="card-text"><strong>Penulis : </strong>{{ $b->penulis }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection