<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'questionnaire_id',
        'question_text',
        'question_type',
        'options',
        'target_status',
        'is_required',
        'order',
    ];

    protected $casts = [
        'options' => 'array',
        'is_required' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the questionnaire that owns the question.
     */
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany(ResponseAnswer::class);
    }

    /**
     * Scope a query to only include questions for a specific alumni status.
     */
    public function scopeForStatus($query, $status)
    {
        return $query->where(function ($query) use ($status) {
            $query->where('target_status', $status)
                ->orWhereNull('target_status');
        });
    }

    /**
     * Scope a query to order questions by their display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
