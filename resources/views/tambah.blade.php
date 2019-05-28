@extends('layouts.master');
@section('content')
    <div class="container">
        <form method="POST" action={{route('student.store')}} enctype="multipart/form-data">
            @csrf
            <label>Nama</label><br>
            <input type="text" name="nama"><br>
            <label>Alamat</label><br>
            <input type="text" name="alamat"><br>
            <label>mata pelajaran</label><br>
            <select name="course[]" multiple id="course" class="form-control"></select><br>
            <button type="submit" class="btn btn-dark">tambah data</button>
        </form>
         
    </div>    
@endsection
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$('#course').select2({
  ajax: {
    url: 'http://127.0.0.1:8000/ajax/search',
    processResults: function(data){
      return {
        results: data.map(function(item){return {id: item.id, text: item.nama} })
      }
    }
  }
});
</script>
@endsection