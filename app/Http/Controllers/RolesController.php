<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role,Role_user,Permission,Role_permission};
use DB;
class RolesController extends Controller
{	//list all roles
   	public function getIndex(){
   		$roles = Role::all();
   		//dd($roles);
   		return view('roles.index',compact('roles'));
   	}
   	//show form create roles
   	public function create(){
   		$Permissions = Permission::all();
   		return view('roles.add',compact('Permissions'));
   	}
   	public function store(Request $Request){
   		try{
            DB::beginTransaction();
            $role = new Role;
        	//dd($Request->roles);

	        $role->name = $Request->name;
	        $role->display_name = $Request->display_name;
	        $role->save();
	        $permission = $Request->permission;
	        //dd($permission);
	        foreach($permission as $p){
	            $per = new Role_permission;
	            $per->permission_id = $p;

	            $per->role_id = $role->id;
	            $per->save();
        }
        DB::commit();
        return redirect()->route('role.list');

        }
        catch(Exception $Exception){
            DB::rollBack();
        }
        
        //dd('a');
   	}

   	public function edit($id){
   		//dd($id);
        $roles = Role::find($id);
        $getallPer= Role_permission::where('role_id',$id)->pluck('permission_id');
        //dd($permission);
        $permission = Permission::all();
   		return view('roles.edit',compact('roles','permission','getallPer'));
    }
    public function postedit(Request $Request ,$id){
   		try{
            DB::beginTransaction();
            $role =  Role::find($id);
        	//dd($Request->roles);

	        $role->name = $Request->name;
	        $role->display_name = $Request->display_name;
	        $role->save();

	        $permission = $Request->permission;
	//dd($permission);
            $roles = Role_permission::where('role_id',$id)->delete();
            foreach($permission as $per){ 
                $p = new Role_permission;
                $p->role_id = $role->id;

                $p->permission_id = $per ;
                 //dd($per);
                $p->save();

            }

            DB::commit();
            return redirect()->route('role.list');
             }
        catch(Exception $Exception){
            DB::rollBack();
        }
        
        //dd('a');
   	}

   	public function delete($id){
        $role = Role::find($id);
        $role->delete();
        $permission_id = Role_permission::where('role_id',$id)->delete();
        return redirect()->route('role.list');
    }

    
}
