<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiDocsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('api.docs', compact('user'));
    }

    public function generateToken()
    {
        $user = Auth::user();
        $user->generateApiToken();
        return back()->with('success', 'API Token đã được làm mới thành công.');
    }
}
