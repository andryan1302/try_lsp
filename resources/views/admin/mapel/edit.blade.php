@extends('template/main')


@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/mapel"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Mapel</h2>
    <form action="/admin/mapel/update" method="post">
    @csrf
    <div class="form-control">
        <label for="">Nama Mapel</label>
        <input type="text" name="nama" value="{{$data->nama}}">
        <input type="hidden" name="id" value="{{$data->id}}">
    </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
