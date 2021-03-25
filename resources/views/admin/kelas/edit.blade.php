@extends('template/main')

@section('navbar')
<div class="navbar">
            <ul>
                <a href="/admin/kelas"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection
@section('main')
<div class="left">
    <h2>Update Kelas</h2>
    <form action="/admin/kelas/update" method="post">
    @csrf
    <div class="form-control">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <label>Kelas</label>
        <select name="nama">
            <option value="X" @if($data->nama === 'X') selected @endif>X</option>
            <option value="XI" @if($data->nama === 'XI') selected @endif>XI</option>
            <option value="XII" @if($data->nama === 'XII') selected @endif>XII</option>
        </select>
    </div>
    <div class="form-control">
        <label for="">Jurusan</label>
        <select name="id_jurusan" >
            @foreach($datajurusan as $item)
            <option value="{{$item->id}}" @if($item->id === $data->id_jurusan) selected @endif>{{$item->nama}}</option>
            @endforeach
        </select>
    </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
