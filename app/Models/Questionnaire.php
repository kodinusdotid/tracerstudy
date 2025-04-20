<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionaireFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_graduation_year',
        'is_active',
        'allow_edit',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'allow_edit' => 'boolean',
    ];

    /**
     * Get the questions for the questionnaire.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the responses for the questionnaire.
     */
    public function responses()
    {
        return $this->hasMany(AlumniResponse::class);
    }

    /**
     * Get the group of graduation years for the alumni.
     */
    public function graduationYearGroup()
    {
        return $this->hasMany(GraduationYearGroup::class);
    }

    /**
     * Scope a query to only include active questionnaires.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter questionnaires by graduation year.
     */
    public function scopeForGraduationYear($query, $year)
    {
        return $query->where(function ($query) use ($year) {
            $query->where('target_graduation_year', $year)
                ->orWhereNull('target_graduation_year');
        });
    }
}
