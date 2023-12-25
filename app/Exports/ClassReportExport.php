<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ClassReportExport implements FromCollection, WithHeadings, WithEvents
{
    
    protected $students;
    protected $headers;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($students, $headers)
    {
        $this->students = $students;
        $this->headers = $headers;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Student::all();
        return $this->students;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return $this->headers;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the row height
                $event->sheet->getDelegate()->getDefaultRowDimension()->setRowHeight(20);

                // Set the column width
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
                // Set more column widths as needed
            },
        ];
    }

}
