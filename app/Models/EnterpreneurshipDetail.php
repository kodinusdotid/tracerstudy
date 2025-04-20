<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpreneurshipDetail extends Model
{
    /** @use HasFactory<\Database\Factories\EnterpreneurshipDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_response_id',
        'business_name',
        'business_type',
        'business_duration',
        'monthly_revenue',
        'employee_count',
    ];

    /**
     * Get the alumni response that owns the entrepreneurship detail.
     */
    public function alumniResponse()
    {
        return $this->belongsTo(AlumniResponse::class);
    }

    /**
     * Get the alumni associated with this entrepreneurship detail through the response.
     */
    public function alumni()
    {
        return $this->hasOneThrough(AlumniBiodata::class, AlumniResponse::class, 'id', 'id', 'alumni_response_id', 'alumni_id');
    }
}
