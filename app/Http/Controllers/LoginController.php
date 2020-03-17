<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\{User,Role,Permission,Role_user};
use Auth;
use DB;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin/login');
    }
    public function postLogin(LoginRequest $Request){
    	//dd($Request);
    	$data = ['email'=>$Request->email,'password'=>$Request->password];
    	if($Request->remember = 'Remember Me'){
    		$remember = true;
    	}
    	else
    		$remember = false;
    	if(Auth::attempt($data,$remember)){
    		return redirect('Admin/User');
    	}
    	else
    		return redirect('Login')->with('thongbao','Tài khoản hoặc mật khẩu không đúng!');
    }
    public function getLogout(){
        Auth::logout();
        return redirect('Login');
    }
    public function getIndex(){
        $user = User::all();
        //dd($user);
        return view('admin/index',compact('user'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin/add',compact('roles'));
    }
    public function store(Request $Request){
        try{
            DB::beginTransaction();
            $user = new User;
        //dd($Request->roles);

        $user->name = $Request->name;
        $user->email = $Request->email;
        $user->password = bcrypt($Request->password);
        $user->save();
        $role = $Request->roles;
        //dd($role);
        foreach($role as $r){
            $roles = new Role_user;
            $roles->user_id = $user->id;
            $roles->role_id = $r;
            $roles->save();
        }
        DB::commit();
        return redirect()->route('user.list');

        }
        catch(Exception $Exception){
            DB::rollBack();
        }
        
        //dd('a');
        
    }
    public function edit($id){
        $roles = Role::all();
        $user = User::find($id);
        $listRole = Role_user::where('user_id',$id)->pluck('Role_id');
        //dd($listRole);
        return view('admin/edit',compact('roles','user','listRole'));
    }
    public function postedit(Request $Request, $id){

        try{
            DB::beginTransaction();
        //update user table
            $user = User::find($id);
            $user->name = $Request->name;
            $user->email = $Request->email;
            $user->password = bcrypt($Request->password);
            $user->save();

            //update rold User table
            $role = $Request->roles;
            $roles = Role_user::where('user_id',$id)->delete();
            foreach($role as $r){ 
                $roles = new Role_user;
                $roles->user_id = $user->id;
                $roles->role_id = $r;
                $roles->save();
            }

            DB::commit();
            return redirect()->route('user.list');
             }
        catch(Exception $Exception){
            DB::rollBack();
        }
       
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $roles = Role_user::where('user_id',$id)->delete();
        return redirect()->route('user.list');
    }
}
