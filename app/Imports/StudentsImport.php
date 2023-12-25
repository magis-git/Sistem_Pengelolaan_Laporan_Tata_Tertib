<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $existingRecord = Student::where([
            'nis' => $row['nis'],
            'name' => $row['nama']
        ])->first();

        if ($existingRecord) {
            return null; // Skip inserting this row into the database
        }
        
        $model= new Student([
                'nis' => $row['nis'],
                'name' => $row['nama'],
                'kelas' => $row['kelas']
            ]);

        return $model;
    }
}
