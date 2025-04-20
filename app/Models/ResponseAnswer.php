<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseAnswer extends Model
{
    /** @use HasFactory<\Database\Factories\ResponseAnswerFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_response_id',
        'question_id',
        'answer',
    ];

    /**
     * Get the response that owns the answer.
     */
    public function alumniResponse()
    {
        return $this->belongsTo(AlumniResponse::class);
    }

    /**
     * Get the question that owns the answer.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
