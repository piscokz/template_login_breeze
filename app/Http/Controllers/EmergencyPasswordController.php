<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmergencyPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

// const EMERGENCY_PASSWORD = 'SUPER4060$1000;VS{StallerJade};';

class EmergencyPasswordController extends Controller
{

    public function index()
    {
        if (! Gate::allows('isEngineer')) {
            abort(404, 'not found');
        }
        return view('superPrograms.gantiEmergencyPassword', ['data' => EmergencyPassword::find(1)]);
    }

    public function ganti(Request $request)
    {
        if (! Gate::allows('isEngineer')) {
            abort(404, 'not found');
        }

        $data = $request->validate([
            'new_password' => 'required',
        ]);
    

        $emergency_password = EmergencyPassword::find(1);
        $emergency_password->emergency_password = $data['new_password'];
        $emergency_password->save();

        return redirect(route('dashboard'))->with('status', 'ganti emergency_passwword berhasil menjadi ');
    }

    public function showResetForm()
    {
        
        return view('auth.emergency_password_reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'emergency_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $emergency_password = EmergencyPassword::find(1);

        if ($request->emergency_password == $emergency_password->emergency_password) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('login')->with('status', 'Password successfully reset!')->withInput();
        }

        return back()->withErrors('Invalid emergency password.');
    }
}
