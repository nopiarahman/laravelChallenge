<?php

namespace App\Http\Controllers\APIController;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaResources;
use App\Http\Resources\BeritaDetailResources;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::paginate(10);
        return BeritaResources::collection($berita);
    }
    public function show(Berita $berita)
    {
        return new BeritaDetailResources($berita);
    }
    public function search(Request $request)
    {
        $query=Berita::with(['kategori']);
        if($request->keyword){
            $query->where('judul','LIKE','%'.$request->keyword.'%');
        }
        if($request->kategori){
            $query->whereHas('kategori',function($nama) use($request){
                $nama->where('nama',$request->kategori);
            });
        }
        $result = $query->get();
        if($result->isEmpty()){
            return response()->json(['error'=>'Data tidak ditemukan'], 404);
        }
        return response()->json($result, 200);
    }
}
