<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  

        $data = \DB::table('vmengajar')->get();
        $datakelas = \DB::table('vkelas')->get();
        $datamapel = \DB::table('mapel')->get();
        $dataguru = \DB::table('guru')->get();
                 
        return view('admin/mengajar/index',[
            'data' => $data,
            'datakelas' => $datakelas,
            'datamapel' => $datamapel,
            'dataguru' => $dataguru,
        ]);
    }

    public function insert(request $r){
        $insert = \DB::table('mengajar')->insert([
            'nip' => $r->nip,
            'id_mapel' => $r->id_mapel,
            'id_kelas' => $r->id_kelas,
          ]);

        if($insert){
           return redirect('/admin/mengajar');
        }
    }

    public function edit($id){
        $data = \DB::table('mengajar')->where('id',$id)->get()[0];

        $datakelas = \DB::table('vkelas')->get();
        $datamapel = \DB::table('mapel')->get();
        $dataguru = \DB::table('guru')->get();
        return view('admin.mengajar.edit',[
            'data' => $data,
            'datakelas' => $datakelas,
            'datamapel' => $datamapel,
            'dataguru' => $dataguru,
        ]);
    }

    public function update(request $r){
        
        \DB::table('mengajar')->where('id',$r->id)
            ->update([
                'nip' => $r->nip,
                'id_mapel' => $r->id_mapel,
                'id_kelas' => $r->id_kelas,
            ]);

        return redirect('/admin/mengajar');
    }

    public function delete($id){
        \DB::table('mengajar')->where('id',$id)->delete();
        return redirect('/admin/mengajar');
    }
}
