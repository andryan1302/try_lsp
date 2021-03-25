@extends('template/main')

@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/jurusan"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Guru</h2>
    <form action="/admin/jurusan/update" method="post">
    @csrf
        <div class="form-control">
            <label for="">Nama</label>
                <input type="hidden" name="id" value="{{$data->id}}">
                <input type="text" name="nama" value="{{$data->nama}}">
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
