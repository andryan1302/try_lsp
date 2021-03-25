@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Jurusan</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Tambah Jurusan</h3>
    <form action="/admin/jurusan/insert" method="post">
        @csrf
        <div class="form-control">
            <label for="">Nama</label>
            <input type="text" name="nama">
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Jurusan</h1>
    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Action</td>
        </tr>
        @foreach($data as $datas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->nama}}</td>
            <td>
                <a href="/admin/jurusan/edit/{{$datas->id}}">Edit</a>
                <a href="/admin/jurusan/delete/{{$datas->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

