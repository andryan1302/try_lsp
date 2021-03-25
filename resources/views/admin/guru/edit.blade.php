@extends('template/main')


@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/guru"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Guru</h2>
    <form action="/admin/guru/update" method="post">
    @csrf
        <div class="form-control">
            <label for="">NIP</label>
                <input type="text" name="nip" value="{{ $data->nip }}" readonly>
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
                <input type="radio" name="jk" value="L" @if($data->jk === 'L') checked @endif> L
                <input type="radio" name="jk" value="P" @if($data->jk === 'P') checked @endif> P
        </div>
        <div class="form-control">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="40" rows="4">{{$data->alamat}}</textarea>
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        

