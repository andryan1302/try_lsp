@extends('template/main')

@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/mengajar"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Data Mengajar</h2>
    <form action="/admin/mengajar/update" method="post">
    @csrf
    <div class="form-control">
        <label for="">NIP</label>
        <input type="hidden" name="id" value="{{$data->id}}">
        <select name="nip">
            @foreach($dataguru as $guru)
                <option value="{{$guru->nip}}" @if($guru->nip === $data->nip) selected @endif>{{$guru->nip}} || {{$guru->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="">Mapel</label>
        <select name="id_mapel">
            @foreach($datamapel as $mapel)
                <option value="{{$mapel->id}}" @if($mapel->id === $data->id_mapel) selected @endif>{{$mapel->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="">kelas</label>
        <select name="id_kelas">
            @foreach($datakelas as $kelas)
                <option value="{{$kelas->id}}" @if($kelas->id === $data->id_kelas) selected @endif>{{$kelas->nama_kelas}} || {{$kelas->nama_jurusan}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
