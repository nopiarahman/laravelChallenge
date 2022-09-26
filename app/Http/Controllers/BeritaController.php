<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeritaRequest;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::paginate(10);

        return view('berita.index',compact('berita'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('berita.create',compact('kategori'));
    }
    public function store(StoreBeritaRequest $request)
    {
        $requestData=$request->all();
        if ($request->hasFile('foto')) {
            $file_nama            = $request->file('foto')->store('public/berita/foto');
            $requestData['foto'] = $file_nama;
        } else {
            unset($requestData['foto']);
        }
        $berita=Berita::create($requestData);
        return redirect()->route('berita')->with('status','Berita Berhasil Disimpan');
    }
    public function edit(Berita $id)
    {
        $kategori = Kategori::all();
        return view('berita.edit',compact('id','kategori'));
    }
    public function update(StoreBeritaRequest $request, Berita $id)
    {
        $requestData=$request->all();
        if ($request->hasFile('foto')) {
            $file_nama            = $request->file('foto')->store('public/berita/foto');
            $requestData['foto'] = $file_nama;
        } 
        $id->update($requestData);
        return redirect()->route('berita')->with('status','Berita Berhasil Dirubah');
    }
    public function destroy(Berita $id)
    {
        $id->delete();
        return redirect()->back()->with('status','Berita berhasil dihapus');
    }
}
