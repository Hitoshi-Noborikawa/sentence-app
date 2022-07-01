<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $sentences = Sentence::where('user_id', $user->id)->get();

        return view('dashboard', compact('user', 'sentences'));
    }
}
