<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Queue\RedisQueue;

class BukuController extends Controller
{
    public function indexpublic()
    {
        $buku = Buku::all();
        return view('welcome', compact('buku'));
    }

    public function index()
    {
        $bukus = Buku::Latest()->paginate(10);
        return view('index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover'        => 'required|image|mimes:png,jpg,jpeg',
            'judul'        => 'required',
            'penulis'      => 'required',
            'tahun_terbit' => 'required',
        ]);

        $cover = $request->file('cover');
        $cover->storeAs('public/buku', $cover->hashName());

        $bukus = new Buku();
        $bukus->judul = $request->input('judul');
        $bukus->penulis = $request->input('penulis');
        $bukus->tahun_terbit = $request->input('tahun_terbit');
        $bukus->cover = $cover->hashName();

        $bukus->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan.');
    
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->route('buku.index')->with(['gagal' => "Buku tidak ditemukan!"]);
        }
        return view('edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'judul'        => 'required',
        'penulis'      => 'required',
        'cover'      => 'required',
        'tahun_terbit' => 'required',
        ]);

        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->route('buku.index')->with(['gagal' => "Buku tidak ditemukan!"]);
        }
        
        if ($request->file('cover') == '') {
            $buku->judul        =$request->judul;
            $buku->penulis      =$request->penulis;
            $buku->cover      =$request->cover; 
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->update();   
        } else {
            Storage::disk('local')->delete('public/buku/'.$buku->cover);

            $cover = $request->file('cover');
            $cover->storeAs('public/buku', $cover->hashName());

            $buku->judul        =$request->judul;
            $buku->penulis      =$request->penulis;
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->cover        =$cover->hashName();
            $buku->update(); 
        }
        
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate!.');
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
    
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
    
}