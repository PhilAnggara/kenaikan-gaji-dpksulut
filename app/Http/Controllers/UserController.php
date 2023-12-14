<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $items = User::where('role', '!=', 'Kepala Dinas')->get()->sortDesc();
        return view('pages.pengguna', compact('items'));
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
        //
    }

    
    public function destroy(string $id)
    {
        $item = User::find($id);
        $title = $item->name;
        $item->delete();

        return redirect()->back()->with('success', $title.' dihapus!');
    }
}
