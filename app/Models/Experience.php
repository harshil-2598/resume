<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'user_id',
        'job_title',
        'employer',
        'job_location',
        'start_date',
        'end_date',
        'currently_working',
        'is_delete',
    ];

    public function Getuser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
