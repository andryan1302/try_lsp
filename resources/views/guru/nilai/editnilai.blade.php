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
    <h2>Edit Data Nilai</h2>
    <form action="/guru/data-nilai/update" method="post">
    @csrf
    <div class="form-control">
        <label for="">Nama Siswa</label>
           <input type="hidden" name="id" value="{{$data_nilai->id}}">
           <input type="text" name="siswa" value="{{$data_nilai->nis}} || {{$data_nilai->nama_siswa}}" readonly>
    </div>
    <div class="form-control">
        <label for="">Ulangan Harian</label><br>
        <input type="number" name="uh" id="" value="{{$data_nilai->uh}}">
    </div>
    <div class="form-control">
        <label for="">Ulangan Tengah Semester</label><br>
        <input type="number" name="uts" value="{{$data_nilai->uts}}">
    </div>
    <div class="form-control">
        <label for="">Ulangan Akhir Semester</label><br>
        <input type="number" name="uas" id="" value="{{$data_nilai->uas}}">
    </div>        
        <input type="submit" value="Update" class="btn-submit">
    </form>
</div>
@endsection
        
