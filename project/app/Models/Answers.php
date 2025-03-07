<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\Console\Question\Question;

class Answers extends Model
{
    use HasFactory;
    protected $fillable = ['question_id','content','is_correct'];


    public function questions():BelongsTo
    {
        return $this->belongsTo(Questions::class);
    }
}
