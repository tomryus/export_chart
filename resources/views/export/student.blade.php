
    <table border="5px">
        <tr>
            <td>Nama</td>
            <td>alamat</td>
            <td>mata pelajaran</td>
        </tr>
            @foreach ($student as $item)
            <tr>
            <td>{{$item->nama}}</td>
            <td>{{$item->alamat}}</td>
            <td>@foreach ($item->courses as $ite)
                {{$ite->nama}}<br>
                @endforeach
            </td> 
            @endforeach
        </tr> 
    </table>