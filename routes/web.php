<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('student/exportexcel','StudentController@exportexcel')->name('student.exportexcel');
Route::get('student/{id}/exportpdf','StudentController@exportpdf')->name('student.exportpdf');
Route::get('/nilai', function () {
    $siswa = \App\Student::with('courses')->get();
    $siswa1 = \App\Student::where('id','2')->with('courses')->get();

    //return $siswa;

    $mapel = [];
    $nilai=[];
    foreach($siswa1 as $item){
        foreach($item->courses as $ite){
            $mapel[] = $ite->nama;
            $nilai[] = $ite->pivot->nilai;
            
        }
    }
    //return $nilai;
    return view('siswa',['siswa'=>$siswa,'mapel'=>$mapel,'nilai'=>$nilai]);
});
Route::get('ajax/search','CourseController@ajaxsearch')->name('ajax.search');
Route::put('student/prosesnilai', 'StudentController@addnilai')->name('student.add');
Route::get('student/addnilai', 'StudentController@tambahnilai')->name('student.nilai');


Route::resource('student', 'StudentController');


Route::get('/sukamakmur', function () {
    $desa = \App\desa::where('nama','like','%sukamakmur%')->get();
    return view('home',['desa'=>$desa]);
});

Route::get('/provinsi', function () {
    $desa = \App\provinsi::all();
    return $desa;
});

Route::resource('/desa', 'DesaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
