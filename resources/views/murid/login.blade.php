@extends('template/main')
@extends('template/navbar')

@section('main')
<div class="left">
    <div class="leftup">
        <h1>Login</h1>
        <hr style="margin-top:10px">
        <div class="button-login">
            <a href="/admin/login"><button class="btn-login">Admin</button></a>
            <a href="/guru/login"><button class="btn-login">Guru</button></a>
            <a href="/murid/login"><button class="btn-login">Murid</button></a>
        </div>
        <p>Pilih login yang sesuai dengan anda</p>
        <hr>
        <h3 style="margin-top:10px">Login Murid</h3>
        <form action="/murid/login" method="post">
        @csrf
            <div class="form-control">
                <label for="">NIS</label><br>
                <input type="text" name="nis">
            </div>
            <div class="form-control">
                <label for="">Password</label><br>
                <input type="password" name="password">
            </div>
            <input type="submit" value="kirim" class="btn-submit">
        </form>
    </div>
    <div class="leftdown">
        <h1>Galery</h1>
        <img src="{{ asset('images/header.jpg') }}" alt="">
        <img src="{{ asset('images/header.jpg') }}" alt="">
    </div>
</div>
<div class="right">
    <h1>Selamat Datang</h1>
    <h1>Di Website Penilaian SMK Negeri 1 Cibinong Andryan</h1>
</div>
@endsection
        

