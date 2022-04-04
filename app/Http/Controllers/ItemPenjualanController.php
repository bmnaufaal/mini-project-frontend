<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemPenjualanController extends Controller
{
    public function index()
    {
        $nota = Http::get('http://mini-project-api.test/api/getAllIDNota');
        $barang = Http::get('http://mini-project-api.test/api/getAllKodeBarang');
        // $response = $json->collect();
        return view('ItemPenjualan.itempenjualan', ['nota' => $nota, 'barang' => $barang]);
    }
}
