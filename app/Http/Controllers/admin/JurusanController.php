<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $data = \DB::table('jurusan')->get();
        return view('admin/jurusan/index',compact('data'));
    }

    public function insert(request $r){
        $insert = \DB::table('jurusan')->insert([
            'nama' => $r->nama,
          ]);

        if($insert){
           return redirect('/admin/jurusan');
        }
    }

    public function edit($id){
        $data = \DB::table('jurusan')->where('id',$id)->get()[0];
        return view('admin.jurusan.edit',compact('data'));
    }

    public function update(request $r){
        \DB::table('jurusan')->where('id',$r->id)
            ->update([
                'nama' => $r->nama,
            ]);

        return redirect('/admin/jurusan');
    }

    public function delete($id){
        \DB::table('jurusan')->where('id',$id)->delete();
        return redirect('/admin/jurusan');
    }
}
