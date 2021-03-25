@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Data Kelas Yang Diajar</h1>
    <hr style="margin-top:10px">
    <table>
        <tr>
            <td>No</td>
            <td>Kelas</td>
            <td>Mapel</td>
            <td>Action</td>
        </tr>
        @foreach($kelas_ajaran as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->kelas}} {{$item->jurusan}}</td>
            <td>{{$item->mapel}}</td>
            <td><a href="data-nilai/insert/{{$item->id}}">Tambah Nilai</a></td>
        </tr>
        @endforeach
    </table>
</div>
<div class="right">
<h1 style="text-align:left">Data Nilai</h1>
<table>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama Siswa</td>
            <td>Nama Kelas</td>
            <td>Nama Mapel</td>
            <td>Nama Jurusan</td>
            <td>UH</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>NA</td>
            <td>Action</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nis}}</td>
            <td>{{$item->nama_siswa}}</td>
            <td>{{$item->nama_kelas}}</td>
            <td>{{$item->nama_mapel}}</td>
            <td>{{$item->nama_jurusan}}</td>
            <td>{{$item->uh}}</td>
            <td>{{$item->uts}}</td>
            <td>{{$item->uas}}</td>
            <td>{{$item->na}}</td>
            <td>
                <a href="/guru/data-nilai/edit/{{$item->id}}">Edit</a>
                <a href="/guru/data-nilai/delete/{{$item->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

