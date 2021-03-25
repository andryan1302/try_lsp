@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Guru</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Login Guru</h3>
    <form action="/admin/guru/insert" method="post">
        @csrf
        <div class="form-control">
            <label for="">NIP</label>
            <input type="text" name="nip">    
        </div>
        <div class="form-control">
            <label for="">Nama</label>
            <input type="text" name="nama">
        </div>
        <div class="form-control">
            <label for="">Password</label>
                <input type="password" name="password">
        </div>
        <div class="form-control">
                <label for="">Jenis Kelamin</label>
                <input type="radio" name="jk" value="L"> L
             <input type="radio" name="jk" value="P"> P
        </div>
        <div class="form-control">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="40" rows="3"></textarea>
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Guru</h1>
    <table>
            <tr>
                <td>No</td>
                <td>NIP</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Action</td>
            </tr>
        @foreach($data as $datas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->nip}}</td>
            <td>{{$datas->nama}}</td>
            <td>{{$datas->jk}}</td>
            <td>{{$datas->alamat}}</td>
            <td>
                <a href="/admin/guru/edit/{{$datas->nip}}">Edit</a>
                <a href="/admin/guru/delete/{{$datas->nip}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        

