<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $showAlert = !completeUserInformation();

        $a = Permohonan::all()->count();
        $b = Permohonan::where('status', '0')->count();
        $c = Permohonan::where('status', '1')->count();
        $d = Permohonan::where('status', '2')->count();
        
        return view('pages.beranda', compact('showAlert', 'a', 'b', 'c', 'd'));
    }

    public function pendaftaran()
    {
        $user = User::find(auth()->user()->id);
        $existingRequest = $user->permohonan()->where('selesai', '0')->first();
        if ($existingRequest) {
            return view('pages.progress',[
                'item' => $existingRequest
            ]);
        }
        $items = $user->permohonan()->where('status', '!=' , '0')->get()->sortDesc();
        return view('pages.pendaftaran', compact('items'));
    }

    public function kirimPendaftaran(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = auth()->user()->id;
        $fileFields = [
            'sk_berkala', 
            'sk_pangkat', 
            'skp', 
            'pengantar_kepsek', 
        ];
        
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('dokumen', 'public');
            }
        }

        Permohonan::create($data);
        return redirect()->back()->with('success', 'Permohonan kenaikan gaji berhasil dikirim!');
    }

    public function permohonanBaru(Request $request, string $id)
    {
        $item = Permohonan::find($id);
        $item->selesai = '1';
        $item->save();

        return redirect()->back()->with('success', 'Permohonan sebelumnya telah diselesaikan. Silahkan buat permohonan baru!');
    }
}
