<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data kasir untuk diuji oleh admin
        $kasirs = User::where('role', 'kasir')->get();
        
        return response()->json([
            'message' => 'Halaman Kelola Akun Kasir (Khusus Admin)',
            'data' => $kasirs
        ]);
    }
}