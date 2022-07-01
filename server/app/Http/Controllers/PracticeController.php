<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sentence;
use App\Models\SentenceResult;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class PracticeController extends Controller
{
    public function step1($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('practice/step1', compact('user'));
    }

    public function step2($user_id, $sentence_id)
    {
        $user = User::findOrFail($user_id);
        $sentence = Sentence::findOrFail($sentence_id);

        return view('practice/step2', compact('user', 'sentence'));
    }

    public function step3($user_id, $sentence_id)
    {
        $user = User::findOrFail($user_id);
        $sentence = Sentence::findOrFail($sentence_id);
        $sentence_result = SentenceResult::where('sentence_id', $sentence->id)->orderby('created_at', 'desc')->first();
        $sentence_result_id = $sentence_result->id;
        // dd($sentence_result);
        return view('practice/step3', compact('user', 'sentence', 'sentence_result', 'sentence_result_id'));
    }

    public function createSentence(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $title = $request->title;
        $text_ja = $request->text_ja;

        $created_sentence = Sentence::create(['title' => $title, 'text_ja' => $text_ja, 'user_id' => $user->id]);
        Log::debug("created_sentence = " . $created_sentence);

        return redirect()->route('practice.step2', ['user_id' => $user->id]);
    }

    public function updateSentence(Request $request, $user_id, $sentence_id)
    {
        $user = User::findOrFail($user_id);
        $answer_en = $request->answer_en;
        $sentence = Sentence::findOrFail($sentence_id);
        $text_ja = $sentence->text_ja;
        // text_jaをdeepLの翻訳にかける
        $correct_en = $this->deepLApi($text_ja);

        $sentence_result = SentenceResult::create([
            'answer_en' => $answer_en,
            'correct_en' => $correct_en,
            'sentence_id' => $sentence->id,
        ]);
        Log::debug("create sentence_result = " . $sentence_result);

        return redirect()->route('practice.step3', ['user_id' => $user->id, 'sentence_id' => $sentence->id]);
    }

    public function updateScore(Request $request, $sentence_result_id)
    {
        $user_id = $request->user_id;
        $score = $request->score;

        $sentence_result = SentenceResult::findOrFail($sentence_result_id);
        $sentence_result->score = $score;
        Log::debug('get $sentence_result');
        Log::debug($sentence_result);
        $sentence_result->save();
        Log::debug('save $sentence_result');
        Log::debug($sentence_result);

        return 'scoreを保存しました';
    }

    private function deepLApi($text_ja)
    {
        // パラメーター
        $url = 'https://api-free.deepl.com/v2/translate';
        $params = [
            'auth_key' => config('study.deepl_api_key'),
            'text' => $text_ja,
            'source_lang' => 'JA', // 翻訳対象の言語
            "target_lang" => 'EN'  // 翻訳後の言語
        ];

        $response = Http::get($url, $params);

        // $response->ok() : bool;
        if($response->ok()) {
            $response_data = $response->json();
            $translated_text = Arr::get($response_data, 'translations.0.text');
            return $translated_text;
        } else {
            // bladeにerrorを返したい
        }
    }
}
