<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Chapter;
use Session;
use Hash;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\User;
use App\Models\Theloai;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user-> name = $data['name'];
        $user -> save();
        return redirect()->back()->with('status','Thêm user thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()-> back()-> with('status', 'Xóa người dùng thành công!');
    }
    public function impersonate($id){
        $user = User::find($id);
        if($user){
            Session::put('impersonate',$user->id);

        }
        return redirect('/home');
    }
    public function stopImpersonate(){

    }
    public function index()
    {
        if(Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('btv') || Auth()->user()->hasRole('writer') || Auth()->user()->hasRole('editer'))
        {
       
        $user = User::with('roles','permissions')->get();
        
        return view('admincp.user.index')->with(compact('user'));
        }
        

        else
            return redirect('/');
    }
  
    public function phanvaitro($id){
        $user = User::find($id);
       $permissions = Permission::orderBy('id','DESC')->get();
        $role = Role::orderBy('id','DESC')->get();
        $all_column_roles = $user->roles->first();
        return view('admincp.user.phanvaitro',compact('user','role','all_column_roles','permissions'));
    }
    public function phanquyen($id){
        $user = User::find($id);

       $permissions = Permission::orderBy('id','DESC')->get();
   
        $name_roles = $user->roles->first()->name;
        $get_permission_via_role = $user->getPermissionsViaRoles();
       
        return view('admincp.user.phanquyen',compact('user','name_roles','permissions','get_permission_via_role'));
    }
    public function insert_roles(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        $role_id = $user->roles->first()->id;
     
        return redirect()->back()->with('status','Thêm vai trò cho user thành công!');
    }
    public function insert_permission(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        //capquyen
        $role = Role::find($role_id);
        $role->syncPermissions($data['permission']);
        //layquyen
        $get_permission_via_role = $user->getPermissionsViaRoles();

        return redirect()->back()->with('status','Thêm quyền cho user thành công!');
    }
    public function insert_per_permission(Request $request){
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission ->save();
        return redirect()->back()->with('status','Thêm quyền thành công!');
    }
    public function insert_r_role(Request $request){
        $data = $request->all();
        $role = new Role();
        $role->name = $data['role'];
        $role ->save();
        return redirect()->back()->with('status','Thêm vai trò thành công!');
    }

 
}
