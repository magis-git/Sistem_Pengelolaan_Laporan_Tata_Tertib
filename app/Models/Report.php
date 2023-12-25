<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the user that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function violation(): BelongsTo
    {
        return $this->belongsTo(Violation::class);
    }
}
