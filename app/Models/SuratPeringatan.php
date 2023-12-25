<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPeringatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_sp',
        'student_nis',
        'student_name',
        'student_kelas',
        'sp_desc',
    ];
        
}
