@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Data Mengajar</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Tambah Data Mengajar</h3>
    <form action="/admin/mengajar/insert" method="post">
    @csrf
        <div class="form-control">
            <label for="">NIP</label>
            <select name="nip">
            @foreach($dataguru as $guru)
                <option value="{{$guru->nip}}">{{$guru->nip}} || {{$guru->nama}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="">Mapel</label>
            <select name="id_mapel">
            @foreach($datamapel as $mapel)
                <option value="{{$mapel->id}}">{{$mapel->nama}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="">kelas</label>
            <select name="id_kelas">
            @foreach($datakelas as $kelas)
                <option value="{{$kelas->id}}">{{$kelas->nama_kelas}} {{$kelas->nama_jurusan}}</option>
            @endforeach
            </select>
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Mengajar</h1>
    <table>
        <tr>
            <td>No</td>
            <td>NIP</td>
            <td>Mapel</td>
            <td>Kelas</td>
            <td>Jurusan</td>
            <td>Action</td>
        </tr>
        @foreach($data as $datas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->nip}}</td>
            <td>{{$datas->mapel}}</td>
            <td>{{$datas->kelas}}</td>
            <td>{{$datas->jurusan}}</td>
            <td>
                <a href="/admin/mengajar/edit/{{$datas->id}}">Edit</a>
                <a href="/admin/mengajar/delete/{{$datas->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

