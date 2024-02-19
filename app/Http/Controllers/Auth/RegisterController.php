<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validasi data yang diterima dari formulir pendaftaran
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', Rule::in(['admin', 'petugas'])],
        ]);
    
        // Buat pengguna baru berdasarkan data yang diterima dari formulir pendaftaran
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role; // Set peran pengguna sesuai dengan pilihan dari formulir
        $user->password = Hash::make($request->password); // Hash password sebelum disimpan
        $user->save();
    
        // Redirect pengguna ke halaman yang sesuai setelah pendaftaran
        return redirect()->route('login')->with('Berhasil', 'Silahkan login');
    }
}
