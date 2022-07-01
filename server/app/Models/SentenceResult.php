<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentenceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_en',
        'correct_en',
        'score',
        'sentence_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\Sentence');
    }
}
