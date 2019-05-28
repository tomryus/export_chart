@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="right">
                    <button class="btn btn-info float-right"><a href={{route('student.exportexcel')}} >export excel</a></button>
                    <button class="btn btn-info float-right"><a href={{route('student.nilai')}} >tambah nilai</a></button>
                    <button class="btn btn-info float-right"><a href={{route('student.create')}} >tambah siswa</a></button>
                    @foreach ($siswa as $item)
                    <button class="btn btn-info float-right"><a href={{route('student.exportpdf',$item->id)}} >export pdf</a></button>
                    @endforeach
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <th>provinsi</th>
                            <th>kabupaten</th>
                            <th>kecamatan</th>
                            <th>desa</th>
                            <th>total</th>
                        </thead>
                            @foreach ($siswa as $item)
                        <tbody>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>
                                    @foreach ($item->courses as $course)
                                    <li>{{$course->nama}}</li>
                                    @endforeach
                                </td>
                                <td>@foreach ($item->courses as $course)
                                    <li>{{$course->pivot->nilai}}</li>
                                    @endforeach
                                </td>
                                   
                                <td>{{$item->courses->count()}}</td>
                                <td>{{$item->jumlah()}}</td>            
                                
                
                               
                                
                                                                  
                        </tbody>
                            @endforeach
                    </table>
                    <div id="chart"></div>
               
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: {!!json_encode($mapel)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Nilai',
            data: {!!json_encode($nilai)!!}
    
        }]
    });
</script>
@endsection
