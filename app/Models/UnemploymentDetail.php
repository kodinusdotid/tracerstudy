<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnemploymentDetail extends Model
{
    /** @use HasFactory<\Database\Factories\UnemploymentDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'alumni_response_id',
        'reason',
        'current_efforts',
    ];

    /**
     * Get the alumni response that owns the unemployment detail.
     */
    public function alumniResponse()
    {
        return $this->belongsTo(AlumniResponse::class);
    }

    /**
     * Get the alumni associated with this unemployment detail through the response.
     */
    public function alumni()
    {
        return $this->hasOneThrough(AlumniBiodata::class, AlumniResponse::class, 'id', 'id', 'alumni_response_id', 'alumni_id');
    }
}
