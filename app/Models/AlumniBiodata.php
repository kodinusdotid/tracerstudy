<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniBiodata extends Model
{
    /** @use HasFactory<\Database\Factories\AlumniBiodataFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nis_nisn',
        'full_name',
        'birth_date',
        'gender',
        'phone_number',
        'major',
        'social_media',
        'is_verified',
        'address',
        'graduation_year_group_id',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_verified' => 'boolean',
    ];

    /**
     * Get the user that owns the alumni.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the responses for the alumni.
     */
    public function responses()
    {
        return $this->hasMany(AlumniResponse::class);
    }

    /**
     * Get the testimonials for the alumni.
     */
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    /**
     * Get the group of graduation years for the alumni.
     */
    public function graduationYearGroup()
    {
        return $this->belongsTo(GraduationYearGroup::class);
    }

    /**
     * Scope a query to only include verified alumni.
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope a query to filter by major.
     */
    public function scopeByMajor($query, $major)
    {
        return $query->where('major', $major);
    }
}
