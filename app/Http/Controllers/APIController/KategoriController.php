<?php

namespace App\Http\Controllers\APIController;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResources;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return KategoriResources::collection($kategori);
    }
    public function show(Kategori $kategori)
    {
        return new KategoriResources($kategori);
    }

}
