<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $datajurusan = \DB::table('jurusan')->get();
        $datakelas = \DB::table('vkelas')->get();
        return view('admin/kelas/index',[
            'datakelas' => $datakelas,
            'datajurusan' => $datajurusan,
        ]);
    }

    public function insert(request $r){

        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $insert = \DB::table('kelas')->insert([
            'nama' => $r->nama,
            'id_jurusan' => $r->jurusan,
          ]);

        if($insert){
           return redirect('/admin/kelas');
        }
    }

    public function edit(request $r,$id){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  
        $data = \DB::table('kelas')->where('id',$id)->get()[0];
        $jurusan = \DB::table('jurusan')->get();
        return view('admin.kelas.edit',[
            'data' => $data,
            'datajurusan' =>$jurusan,
        ]);
    }

    public function update(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  
        \DB::table('kelas')->where('id',$r->id)
            ->update([
                'nama' => $r->nama,
                'id_jurusan' => $r->id_jurusan,
            ]);

        return redirect('/admin/kelas');
    }

    public function delete($id){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  
        \DB::table('kelas')->where('id',$id)->delete();
        return redirect('/admin/kelas');
    }
}
