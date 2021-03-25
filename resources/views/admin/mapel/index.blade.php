@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Mapel</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Tambah Kelas</h3>
    <form action="/admin/mapel/insert" method="post">
    @csrf
        <div class="form-control">
            <label for="">Nama Mapel</label>
            <input type="text" name="nama">
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Mapel</h1>
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
                <a href="/admin/mapel/edit/{{$datas->id}}">Edit</a>
                <a href="/admin/mapel/delete/{{$datas->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

