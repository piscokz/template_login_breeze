<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class hapusAkunUserController extends Controller
{
    public function index()
    {
        if (! Gate::allows('isEngineer')) {
            abort(404, 'not found');
        }
        return view('superPrograms.hapusAkunUser');
    }

    public function hapusAkun(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
        ]);
        $hapusAkun = User::find($data['id']);
        
        if ($hapusAkun) {
            $hapusAkun->delete();
            $hapusAkun->delete();
            return redirect(route('dashboard'))->with('status', 'hapus akun berhasil');
        } else {
            // Handle jika data tidak ditemukan
            return redirect(route('dashboard'))->with('status', 'akun udah di apus kali!'); 
        }
    }
}
