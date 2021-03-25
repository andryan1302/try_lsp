@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Siswa</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Tambah Siswa</h3>
    <form action="/admin/siswa/insert" method="post">
    @csrf
    <div class="form-control">
        <label for="">NIS</label>
            <input type="text" name="nis">
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
            <input type="radio" name="jk" value="P">P
            <input type="radio" name="jk" value="L">L
    </div>
    <div class="form-control">
        <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="3"></textarea>
    </div>
    <div class="form-control">
        <label for="">Kelas</label>
            <select name="id_kelas" id="">
                @foreach($kelas as $item)
                <option value="{{$item->id}}">{{$item->nama_kelas}}  {{$item->nama_jurusan}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Siswa</h1>
<table>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Kelas</td>
            <td>Jurusan</td>
            <td>Action</td>
        </tr>
        @foreach($data as $datas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->nis}}</td>
            <td>{{$datas->nama_siswa}}</td>
            <td>
                @if ($datas->jk === 'L')
                    Laki-laki
                @else
                    Perempuan
                @endif
            </td>
            <td>{{$datas->alamat}}</td>
            <td>{{$datas->kelas}}</td>
            <td>{{$datas->jurusan}}</td>
            <td>
                <a href="/admin/siswa/edit/{{$datas->nis}}">Edit</a>
                <a href="/admin/siswa/delete/{{$datas->nis}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

