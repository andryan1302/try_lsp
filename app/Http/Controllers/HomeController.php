<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeAdmin(request $r){
        $role = $r->session()->get('role');
        if($role !== 'admin' && !$r->session()->has('user')){
            return redirect('admin/login');
        }   
       return view('admin.home');
    }

    public function homeGuru(request $r){
        $role = $r->session()->get('role');
        if($role !== 'guru' && !$r->session()->has('user')){
            return redirect('guru/login');
        }  
        return view('guru.home');
    }

    public function homeMurid(request $r){
        $role = $r->session()->get('role');
        if($role !== 'murid' && !$r->session()->has('user')){
            return redirect('murid/login');
        }  
       return view('murid.home');
    }
}
