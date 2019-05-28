<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Student;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = \App\Course::all();
        return view('tambah',['mapel'=>$mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = Student::Create([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'), 
        ]);
        $tambah->courses()->attach($request->get('course'));
         return redirect('/nilai');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function exportexcel() 
    {
        return Excel::download(new StudentExport, 'users.xlsx');
    }
    public function exportpdf($id)
    {
        
        $student = Student::with('courses')->where('id',$id)->get();
        $pdf=PDF::loadView('export.student',['student'=>$student]);
        return $pdf->download('invoice.pdf');
    }
    public function tambahnilai()
    {
        $student = Student::with('courses')->where('id','3')->get();
        return view('tambahnilai',['nilai'=>$student]);
    }
    public function addnilai(request $request)
    {
        $id = 3;
        $course_id = $request->get('course_id');
        $angka = $request->get('nilai');
        $nilai = Student::with('courses')->find($id);
        $nilai->courses()->updateExistingPivot($course_id,['nilai'=>$angka]);
    }
}
