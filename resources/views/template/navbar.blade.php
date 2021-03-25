@section('navbar')
@if(session()->get('role') === 'admin')
        <div class="navbar">
            <ul>
                <a href="/admin/home"><li class="active">Beranda</li></a>
                <a href="/admin/guru"><li>Data Guru</li></a>
                <a href="/admin/jurusan"><li>Data Jurusan</li></a>
                <a href="/admin/kelas"><li>Data Kelas</li></a>
                <a href="/admin/mapel"><li>Data Mapel</li></a>
                <a href="/admin/mengajar"><li>Data Mengajar</li></a>
                <a href="/admin/siswa"><li>Data Siswa</li></a>
                <a href="/logout"><li>Logout</li></a>
            </ul>
        </div>

        @elseif(session()->get('role') === 'guru')
        <div class="navbar">
            <ul>
                <a href="/guru/home"><li class="active">Beranda</li></a>
                <a href="/guru/data-nilai"><li>Data Nilai</li></a>
                <a href="/logout"><li>Logout</li></a>
            </ul>
        </div>
        @elseif(session()->get('role') === 'murid')
        <div class="navbar">
            <ul>  
                <a href="/murid/home"><li class="active">Beranda</li> </a>
                <a href="/murid/nilai"><li>Data Nilai</li></a>
                <a href="/logout"><li>Logout</li></a>
            </ul>
        </div>
        @else
        <div class="navbar">
            <ul>
                <a href="/admin/login"><li class="active">Admin</li></a>
                <a href="/guru/login"><li>Guru</li></a>
                <a href="/murid/login"><li>Siswa</li></a>

            </ul>
        </div>
        @endif
@endsection