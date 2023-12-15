<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalInformationController extends Controller
{
    public function index()
    {
        return view('pages.informasi-pribadi');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id);

        // Verifikasi kata sandi saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Kata sandi saat ini salah.']);
        }

        // Ubah kata sandi pengguna
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diubah.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'min:18', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'telp' => ['required', 'min:5'],
            'tgl_lahir' => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->format('Y-m-d')],
            'jenis_kelamin' => 'required',
        ]);

        $user->update($validated);
        
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
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
        //
    }
}
