<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $data = \DB::table('vsiswa')->get();
        $datakelas = \DB::table('vkelas')->get();
        
        return view('admin.siswa.index',[
            'data' => $data,
            'kelas' => $datakelas,
        ]);
    }

    public function insert(request $r){
        $insert = \DB::table('siswa')
                ->insert([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'jk' => $r->jk,
            'alamat' => $r->alamat,
            'password' => $r->password,
            'id_kelas' => $r->id_kelas,
        ]);

        if($insert){
           return redirect('/admin/siswa');
        }
    }

    public function edit($nis){
        $data = \DB::table('siswa')->where('nis',$nis)->get()[0];
        $datakelas = \DB::table('vkelas')->get();
        return view('admin.siswa.edit',[
            'data' => $data,
            'kelas' => $datakelas,
        ]);
    }

    public function update(request $r){
        \DB::table('siswa')->where('nis',$r->nis)
            ->update([
                'nama' => $r->nama,
                'jk' => $r->jk,
                'alamat' => $r->alamat,
                'password' => $r->password,
                'id_kelas' => $r->id_kelas,
            ]);

        return redirect('/admin/siswa');
    }

    public function delete($nis){
        \DB::table('siswa')->where('nis',$nis)->delete();
        return redirect('/admin/siswa');
    }
}
