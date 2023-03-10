@extends('layouts.app')
@section('content')
<div class="container mt-5"> 
  <div class="row">
    <div class="col-md-12">
        <div class="card.border-0.shadow.rounded">
          <div class="card-header">
              <h4 class="text-center">
                  <i class="bi bi-book"></i> Tambah Buku
              </h4>
          </div>
          <div class="table-responsive">
            <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
            </br>
                <div class="form-group">
                  <label for="judul">Title:</label>
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                  @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </br>
                <div class="form-group">
                  <label for="penulis">Author:</label>
                  <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" value="{{ old('penulis') }}" required>
                  @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </br>
                <div class="form-group">
                  <label for="tahun_terbit">Year of Publication:</label>
                  <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                  @error('tahun_terbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </br>
                <div class="form-group">
                    <label for="cover">Cover Image:</label>
                    <div class="form-group">
                      <input type="file" class="custom-file-input @error('cover') is-invalid @enderror" id="cover" name="cover" required>
                      @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </br>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>    
        </div>
  </div>
</div>
@endsection
