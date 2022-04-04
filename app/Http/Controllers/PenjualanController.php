<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenjualanController extends Controller
{
    public function index()
    {
        $json = Http::get('http://mini-project-api.test/api/getAllIDPelanggan');
        // $response = $json->collect();
        return view('Penjualan.penjualan', ['id_pelanggan' => $json]);
    }
}
