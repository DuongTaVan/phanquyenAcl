<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Permission;
class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission=null )
    {
       //dd($permission); lay tat ca cac quyen khi user login vao he thong
        //lay user login vao he thong
        $listRoleofUser =  DB::table('users')
            ->join('roles_user', 'users.id', '=', 'roles_user.user_id')
            ->join('roles', 'roles.id', '=', 'roles_user.role_id')
            ->where('users.id',auth()->id())
            ->select('roles.*')
            ->get()->pluck('id')->toArray();
            //lay ra tat ca cac quyen
        $listRoleofUser =  DB::table('roles')
            ->join('roles_permission', 'roles.id', '=', 'roles_permission.role_id')
            ->join('permissions', 'permissions.id', '=', 'roles_permission.permission_id')
            ->whereIn('roles.id',$listRoleofUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();
            //dd($listRoleofUser) ;
            //lay ra ma man hinh tuong ung de check phan quyen
            $checkPermission = Permission::where('name',$permission)->value('id');
           // dd($checkPermission) ;
        //kiem tra user co vao dc man hinh khong?
            if($listRoleofUser->contains($checkPermission)){
                    return $next($request);        
            }
            return abort(401);
        
    }
}
