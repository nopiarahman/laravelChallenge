<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategoriRequest;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('kategori.index',compact('kategori'));
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(StoreKategoriRequest $request)
    {
        $kategori=Kategori::create($request->all());
        return redirect()->route('kategori')->with('status','Kategori Berhasil Disimpan');
    }
    public function edit(Kategori $id)
    {
        return view('kategori.edit',compact('id'));
    }
    public function update(StoreKategoriRequest $request, Kategori $id)
    {
        $id->update($request->all());
        return redirect()->route('kategori')->with('status','Kategori Berhasil Dirubah');
    }
    public function destroy(Kategori $id)
    {
        $id->delete();
        return redirect()->back()->with('status','Kategori berhasil dihapus');
    }
}
