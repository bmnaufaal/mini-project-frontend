<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TableController extends Controller
{
    public function saveID()
    {
        $id = $request->input('data');
        Session::put('id', $id);
        return $id;
    }
}
