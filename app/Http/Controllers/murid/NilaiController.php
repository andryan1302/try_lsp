<?php

namespace App\Http\Controllers\murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(request $r){
        $role = $r->session()->get('role');
        if($role !== 'murid' && !$r->session()->has('user')){
            return redirect('murid/login');
        }

        $nis = $r->session()->get('user');
        $data = \DB::table('vnilai')->where('nis',$nis)->get();

        return view('murid.nilai.index',compact('data'));
    }
}
