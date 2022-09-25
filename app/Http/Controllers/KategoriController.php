<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('Kategori.index');
    }
    public function create()
    {
        return view('Kategori.create')
    }
}
