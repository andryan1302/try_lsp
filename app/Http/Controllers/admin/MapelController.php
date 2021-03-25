<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $data = \DB::table('mapel')->get();
        return view('admin/mapel/index',compact('data'));
    }

    public function insert(request $r){
        $insert = \DB::table('mapel')->insert([
            'nama' => $r->nama,
          ]);

        if($insert){
           return redirect('/admin/mapel');
        }
    }

    public function edit($id){
        $data = \DB::table('mapel')->where('id',$id)->get()[0];
        return view('admin.mapel.edit',compact('data'));
    }

    public function update(request $r){
        \DB::table('mapel')->where('id',$r->id)
            ->update([
                'nama' => $r->nama,
            ]);

        return redirect('/admin/mapel');
    }

    public function delete($id){
        \DB::table('mapel')->where('id',$id)->delete();
        return redirect('/admin/mapel');
    }
}
