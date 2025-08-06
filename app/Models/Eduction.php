<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Eduction extends Model
{
    protected $table = 'eductions';
    protected $fillable = [
        'user_id',
        'school_name',
        'school_location',
        'degree',
        'study_field',
        'passing_year',
        'is_delete'
    ];

    public function Eductions(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
