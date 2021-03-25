<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $data = \DB::table('guru')->get();
        return view('admin/guru/index',compact('data'));
    }

    public function insert(request $r){
        $insert = \DB::table('guru')->insert([
            'nip' => $r->nip,
            'nama' => $r->nama,
            'jk' => $r->jk,
            'alamat' => $r->alamat,
            'password' => $r->password,
        ]);

        if($insert){
           return redirect('/admin/guru');
        }
    }

    public function edit($id){
        $data = \DB::table('guru')->where('nip',$id)->get()[0];
        return view('admin.guru.edit',compact('data'));
    }

    public function update(request $r){
        \DB::table('guru')->where('nip',$r->nip)
            ->update([
                'nip' => $r->nip,
                'nama' => $r->nama,
                'jk' => $r->jk,
                'alamat' => $r->alamat,
                'password' => $r->password,
            ]);

        return redirect('/admin/guru');
    }

    public function delete($nip){
        \DB::table('guru')->where('nip',$nip)->delete();
        return redirect('/admin/guru');
    }
}
