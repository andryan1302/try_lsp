@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <h1>Tambah Kelas</h1>
    <hr style="margin-top:10px">
    <h3 style="margin-top:10px">Tambah Kelas</h3>
    <form action="/admin/kelas/insert" method="post">
    @csrf
        <div class="form-control">
            <label for="">Nama</label>
                <select name="nama">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>    
        </div>
        <div class="form-control">
            <label for="">Jurusan</label>
                <select name="jurusan">
                    @foreach($datajurusan as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
        </div>
        <input type="submit" value="kirim" class="btn-submit">
    </form>
</div>
<div class="right">
<h1 style="text-align:left">Data Kelas</h1>
    <table>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jurusan</td>
            <td>Action</td>
        </tr>
        @foreach($datakelas as $datas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->nama_kelas}}</td>
            <td>{{$datas->nama_jurusan}}</td>
            <td>
                <a href="/admin/kelas/edit/{{$datas->id}}">Edit</a>
                <a href="/admin/kelas/delete/{{$datas->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
        


        

