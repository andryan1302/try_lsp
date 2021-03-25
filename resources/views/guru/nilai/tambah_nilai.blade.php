@extends('template/main')
@section('navbar')
<div class="navbar">
            <ul>
                <a href="/guru/data-nilai"><li class="active">Kembali</li></a>
            </ul>
</div>
@endsection

@section('main')
<div class="left">
    <h2>Tambah Data Nilai</h2>
    <form action="/guru/data-nilai/insert" method="post">
    @csrf
    <div class="form-control">
        <label for="">Nama Siswa</label>
           <select name="murid">
             @foreach($data_siswa as $item)
             <option value="{{$item->nis}}">{{$item->nama}}</option>
             @endforeach
           </select>
    </div>
    <div class="form-control">
        <label for="">Nama Mapel</label>
            @foreach($data_mengajar as $data)
            <select name="mengajar" id="">
                <option value="{{$data->id}}">{{$data->mapel}}</option>
            </select>
            @endforeach
    </div>
    <div class="form-control">
        <label for="">Ulangan Harian</label>
            <input type="text" name="uh">
    </div>
    <div class="form-control">
        <label for="">Ulangan Tengah Semester</label>
            <input type="text" name="uts">
    </div>
    <div class="form-control">
        <label for="">Ulangan Akhir Semester</label>
            <input type="text" name="uas">
    </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
@endsection
        
