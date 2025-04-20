<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    /** @use HasFactory<\Database\Factories\EducationDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_response_id',
        'university_name',
        'study_program',
        'degree',
        'status',
    ];

    /**
     * Get the alumni response that owns the education detail.
     */
    public function alumniResponse()
    {
        return $this->belongsTo(AlumniResponse::class);
    }

    /**
     * Get the alumni associated with this education detail through the response.
     */
    public function alumni()
    {
        return $this->hasOneThrough(AlumniBiodata::class, AlumniResponse::class, 'id', 'id', 'alumni_response_id', 'alumni_id');
    }
}
