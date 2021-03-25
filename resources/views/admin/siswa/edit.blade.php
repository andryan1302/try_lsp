@extends('template/main')

@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/siswa"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Siswa</h2>
    <form action="/admin/siswa/update" method="post">
    @csrf
    <div class="form-control">
        <label for="">NIS</label>
            <input type="text" name="nis" readonly value="{{$data->nis}}">
    </div>
    <div class="form-control">
        <label for="">Nama</label>
            <input type="text" name="nama" value="{{$data->nama}}">
    </div>
    <div class="form-control">
        <label for="">Password</label>
            <input type="password" name="password" value="{{$data->password}}">
    </div>
    <div class="form-control">
        <label for="">Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" @if($data->jk === 'L') checked @endif>L
            <input type="radio" name="jk" value="P" @if($data->jk === 'P') checked @endif>P
    </div>
    <div class="form-control">
        <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="4">{{$data->alamat}}</textarea>
    </div>
    <div class="form-control">
        <label for="">Kelas</label>
            <select name="id_kelas" id="">
                @foreach($kelas as $item)
                <option value="{{$item->id}}" @if($item->id === $data->id_kelas) selected @endif>{{$item->nama_kelas}} {{$item->nama_jurusan}}</option>
                @endforeach
            </select>
    </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
