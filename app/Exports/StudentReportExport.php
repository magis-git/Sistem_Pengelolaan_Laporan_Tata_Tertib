<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentReportExport implements FromCollection, WithHeadings, WithEvents
{
    protected $reports;
    protected $headers;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($reports, $headers)
    {
        $this->reports = $reports;
        $this->headers = $headers;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Student::all();
        return $this->reports;
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
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(50);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(15);
                // Set more column widths as needed
            },
        ];
    }


}
