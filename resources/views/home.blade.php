@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <th>provinsi</th>
                            <th>kabupaten</th>
                            <th>kecamatan</th>
                            <th>desa</th>
                        </thead>
                            @foreach ($desa as $item)
                        <tbody>
                                <td>{{$item->kecamatan->kabupaten->provinsi->nama}}</td>
                                <td>{{$item->kecamatan->kabupaten->nama}}</td>
                                <td>{{$item->kecamatan->nama}}</td>
                                <td>{{$item->nama}}</td>                                      
                        </tbody>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
