@extends('layouts.app')
@section('content')
<div class="container mt-5"> 
    <div class="row">
      <div class="col-md-12">
          <div class="card.border-0.shadow.rounded">
            <div class="card-header">
                <h4 class="text-center">
                    <i class="bi bi-book"></i> Edit Buku
                </h4>
            </div>
            <div class="table-responsive">
              <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label for="judul">Title:</label>
                      <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
                      @error('judul')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <br>
                  <div class="form-group">
                      <label for="penulis">Author:</label>
                      <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
                      @error('penulis')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <br>
                  <div class="form-group">
                      <label for="tahun_terbit">Year of Publication:</label>
                      <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                      @error('tahun_terbit')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  <br>
                  <div class="form-group">
                    @if ($buku->cover)
                          <div class="mt-2">
                              <img src="{{ asset('storage/buku/' . $buku->cover) }}" alt="Cover Image" style="max-width: 200px;">
                          </div>
                      @endif
                      @error('cover')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <label for="cover">Cover Image:</label>
                      <input type="file" class="form-control-file @error('cover') is-invalid @enderror" id="cover" name="cover">
                      
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div>
          
    </div>
  </div>
@endsection