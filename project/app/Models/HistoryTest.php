<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTest extends Model
{
    use HasFactory;

    protected $table = 'history_test';
    protected $fillable = [
        'candidate_id',
        'answers_id',
    ];
}
