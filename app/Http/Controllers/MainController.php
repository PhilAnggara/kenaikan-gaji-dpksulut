<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $showAlert = false;

        if ($user->nip === null || $user->telp === null || $user->tgl_lahir === null || $user->jenis_kelamin === null) {
            $showAlert = true;
        }
        
        return view('pages.beranda', compact('showAlert'));
    }
}
