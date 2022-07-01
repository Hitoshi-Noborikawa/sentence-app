<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text_ja',
        'answer_en',
        'correct_en',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sentenceResults()
    {
        return $this->hasMany('App\Models\SentenceResult');
    }
}
