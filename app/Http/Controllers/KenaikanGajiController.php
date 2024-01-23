<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class KenaikanGajiController extends Controller
{
    
    public function index()
    {
        $items = Permohonan::all()->sortDesc();
        return view('pages.permohonan', compact('items'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        $item = Permohonan::find($id);

        if ($request->persetujuan) {
            $item->tahap ++;
            $item->save();
    
            return redirect()->back()->with('success', $item->user->name.' disetujui!');
        } elseif ($request->uploadSK) {
            $item->sk = $request->file('sk')->store('sk', 'public');
            $item->tahap ++;
            $item->status = '1';
            $item->save();
            return redirect()->back()->with('success', 'SK berhasil diterbitkan!');
        } else {
            $item->status = '2';
            $item->komentar = $request->komentar;
            $item->save();
    
            return redirect()->back()->with('success', $item->user->name.' ditolak!');
        }
        
    }

    
    public function destroy(string $id)
    {
        //
    }
}
