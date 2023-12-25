<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $attributes =[
        'p1' => 0,
        'p2' => 0,
        'p3' => 0,
        'p4' => 0,
        'p5' => 0,
        'total_poin' => 0
    ];
    
    protected $fillable = [
        'name',
        'nisn',
        'nis',
        'kelas',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'total_poin'
    ];

  
    
    /**
     * Get all of the comments for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
