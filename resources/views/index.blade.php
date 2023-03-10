@extends('layouts.app')
@section('content')    
<div class="container mt-5"> 
      <div class="row">
        <div class="col-md-12">
            <div class="card.border-0.shadow.rounded">
              <div class="card-header">
                  <h4 class="text-center">
                      <i class="bi bi-book"></i> Daftar Buku
                  </h4>
              </div>
                <div class="card-body">
                  <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="bi bi-plus-square-dotted"></i> Tambah Buku </a>
                    <table class="table table-bordered table-striped mt-2">
                      <thead class="text-center">
                        <th style="width: 50px">No</th>
                      <th style="width: 200px">Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th style="width:200px">Action</th>
                  </thead>
                  <tbody>
                    @forelse ($bukus as $i => $buku)
                    <tr>
                        <td class="text-center">{{ $i + 1}}</td>
                        <td class="text-center">
                          @if(Storage::disk('local')->exists('public/buku/'.$buku->cover))
                                <img src="{{ asset('storage/buku/'.$buku->cover) }}" alt="Cover Image" class="img-fluid img-thumbnail">

                            @else
                                <span class="text-danger">Cover tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $buku->judul }} </td>
                        <td>{{ $buku->penulis }} </td>
                        <td>{{ $buku->tahun_terbit }} </td>
                       <td>

                        <div class="btn-group text-center my-3">
                          <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit </a>
                          <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                          </form>
                        </div>
                        
                       </td>
                    </tr>
                  @empty                      
                   <tr>
                      <td colspan="6">
                        <div class="alert alert-info">Data buku tidak tersedia</div>
                      </td>
                   </tr>
                   @endforelse
                  </tbody>
                    </table>
                  {{ $bukus->links() }}
            </div>  
          </div>
      </div>
    </div>
  
@endsection