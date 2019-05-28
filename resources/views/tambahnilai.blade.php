@extends('layouts.master')
@section('content')
<div class="container">
    <form method="POST" action={{route('student.add')}} enctype="multipart/form-data" >
    @method('PUT')
    @csrf
    <label>mapel</label>
    <select name="course_id" class="form-control">
        @foreach ($nilai as $item)
        @foreach ($item->courses as $ite)
            <option value="{{$ite->id}}"> {{$ite->nama}} {{$ite->id}}
        @endforeach
        @endforeach
    </select><br>
    <label>nilai</label>
    <input type="number" name="nilai"><br>
    <button type="submit" class="btn btn-info">tambah nilai</button>

</form>
</div>
    
@endsection