<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        $user = $r->session()->get('user');
        $kelas_ajaran = \DB::table('vmengajar')->where('nip',$user)->get();
        $nilai = \DB::table('vnilai')->where('nip',$user)->get();

        return view('guru.nilai.datanilai',[
            'kelas_ajaran' => $kelas_ajaran,
            'data' => $nilai,
        ]);
    }

    public function viewinsert(request $r, $id_mengajar){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        $nip = $r->session()->get('user');
        $data_mengajar = \DB::table('mengajar')->where('id',$id_mengajar)->get()[0];
        $data_siswa = \DB::table('siswa')->where('id_kelas',$data_mengajar->id_kelas)->get();
        $data_vmengajar = \DB::table('vmengajar')->where('nip',$nip)->where('id',$data_mengajar->id)->get();

        return view('guru/nilai/tambah_nilai',[
            'data_siswa' => $data_siswa,
            'data_mengajar' => $data_vmengajar 
        ]);
    }

    public function insert(request $r){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        $na = ($r->uh + $r->uts + $r->uas) / 3;
        $na = number_format($na,2);
        \DB::table('nilai')->insert([
            'uh' => $r->uh,
            'uts' => $r->uts,
            'uas' => $r->uas,
            'na' => $na,
            'id_mengajar' => $r->mengajar,
            'nis' => $r->murid,
        ]);
        
        return redirect('guru/data-nilai');
    }

    public function edit(request $r,$id){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        $data_nilai = \DB::table('vnilai')->where('id',$id)->get()[0];
        return view('guru/nilai/editnilai',compact('data_nilai'));
        
    }

    public function update(request $r){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        $na = ($r->uh + $r->uts + $r->uas) / 3;
        $na = number_format($na,2);

        \DB::table('nilai')->where('id',$r->id)->update([
            'uh' => $r->uh,
            'uts' => $r->uts,
            'uas' => $r->uas,
            'na' => $na,
        ]);

        return redirect('guru/data-nilai');
    }

    public function delete(request $r,$id){
        $role = $r->session()->get('role');
        if(!$r->session()->has('user') && $role !== 'guru'){
            return redirect('guru/login');
        }

        \DB::table('nilai')->where('id',$id)->delete();
        return redirect('/guru/data-nilai');
    }
}
