<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswa = \App\Student::where('id','2')->with('courses')->get();
        return $siswa;
    }

    public function map($student): array
    {
        return [
            $student->nama,
            $student->jumlah()
            
        ];
    }
    public function headings(): array
    {
        return [
           'nama',
           'jumlah'
        ];
    }
}

