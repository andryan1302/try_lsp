@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="right" style="width:100%">
<h1 style="text-align:left">Data Nilai</h1>
  <br>
<table>
    <tr>
      <th>No</th>
      <th>Nama Guru</th>
      <th>Mapel</th>
      <th>UH</th>
      <th>UTS</th>
      <th>UAS</th>
      <th>NA</th>
    </tr>
    @foreach($data as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_guru }}</td>
        <td>{{ $item->nama_mapel }}</td>
        <td>{{ $item->uh }}</td>
        <td>{{ $item->uts }}</td>
        <td>{{ $item->uas }}</td>
        <td>{{ $item->na }}</td>
      </tr>
    @endforeach
  </table>
</div>
@endsection
        


        

