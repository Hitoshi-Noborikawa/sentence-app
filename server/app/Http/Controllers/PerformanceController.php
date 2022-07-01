<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sentence;
use App\Models\SentenceResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sentences = Sentence::where('user_id', $user->id)->get();
        return view('performance/index', compact('user', 'sentences'));
    }

    public function detail($user_id, $sentence_id)
    {
        $sentence = Sentence::findOrFail($sentence_id);
        $sentence_results = SentenceResult::where('sentence_id', $sentence_id)->get();

        return view('performance/detail', compact('sentence', 'sentence_results'));
    }
}
