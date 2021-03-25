<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function viewLoginAdmin(request $r){
        $role = $r->session()->get('role');
        if($role === 'admin' && $r->session()->has('user')){
            return redirect('admin/home');
        }       
        return view('admin.login');
    }

    public function loginAdmin(request $req){
        $data = \DB::table('admin')
                    ->where('username',$req->username)
                    ->where('password',$req->password)
                    ->count();
        if($data === 0){
            return redirect('/admin/login');
        }
        
        session([
            'user' => $req->username,
            'role' => 'admin',
        ]);

        return redirect('/admin/home');
    }

    public function viewLoginGuru(request $r){

        $role = $r->session()->get('role');
        if($role === 'guru' && $r->session()->has('user')){
            return redirect('guru/home');
        }       
        return view('guru.login');
    }

    public function loginGuru(request $req){
        $data = \DB::table('guru')
                    ->where('nip',$req->nip)
                    ->where('password',$req->password)
                    ->count();
        if($data === 0){
            return redirect('/guru/login');
        }
        
        session([
            'user' => $req->nip,
            'role' => 'guru',
        ]);

        return redirect('/guru/home');
    }
    
    public function viewLoginMurid(request $r){

        $role = $r->session()->get('role');
        if($role === 'murid' && $r->session()->has('user')){
            return redirect('murid/home');
        }       
        return view('murid.login');
    }

    public function loginMurid(request $req){
        $data = \DB::table('siswa')
                    ->where('nis',$req->nis)
                    ->where('password',$req->password)
                    ->count();
        if($data === 0){
            return redirect('/murid/login');
        }
        
        session([
            'user' => $req->nis,
            'role' => 'murid',
        ]);

        return redirect('/murid/home');
    }

    public function logout(request $req){
        $role = $req->session()->get('role');
        
        $req->session()->forget(['role','user']);

        if($role === 'admin'){
            return redirect('/admin/login');
        }
        elseif($role === 'guru'){
            return redirect('/guru/login');
        }else{
            return redirect('/murid/login');
        }
    }
}
