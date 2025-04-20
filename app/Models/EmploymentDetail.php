<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDetail extends Model
{
    /** @use HasFactory<\Database\Factories\EmploymentDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_response_id',
        'company_name',
        'industry_type',
        'position',
        'waiting_period',
        'job_source',
    ];

    /**
     * Get the alumni response that owns the employment detail.
     */
    public function alumniResponse()
    {
        return $this->belongsTo(AlumniResponse::class);
    }

    /**
     * Get the alumni associated with this employment detail through the response.
     */
    public function alumni()
    {
        return $this->hasOneThrough(AlumniBiodata::class, AlumniResponse::class, 'id', 'id', 'alumni_response_id', 'alumni_id');
    }
}
