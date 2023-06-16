<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class USerController extends Controller
{


    public function index()
    {
//      $users = User::query()->paginate(15);
        $title = 'لیست کاربران';  //show breadcrumb
        return view('admin.user.list', compact('title'));  //change laravel to livewire
    }


    public function create()
    {
        $title = "ایجاد کاربر";  //show breadcrumb
        return view('admin.user.create', compact('title'));
    }


    public function store(CreateUserRequest $request)
    {
        //database => input(blade)
        $image = User::saveImage($request->file);
        User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->email,
            'phone' => $request->get('mobile'),
            'password' => Hash::make($request->input('password')),
            'photo' => $image
        ]);
        return redirect()->back()->with('message', 'کاربر جدید با موفقیت ثبت شد');  //with(session flash یک بار مصرف) -> key , value
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
//      $user = User::query()->find($id);    //هم این مدلی درسته + هم مادل بایدینگ
        $title = 'ویرایش کاربر';
        return view('admin.user.edit', compact('user', 'title'));
    }


    public function update(EditUserRequest $request, $id)
    {
        $user = User::query()->find($id);
//      $image = User::SaveImage($request->file);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->email,
            'phone' => $request->get('mobile'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $user->password,
//          'photo' => $image,
        ]);

        return redirect()->route('users.index')->with('message', 'کاربر با موفقیت ویرایش شد');  //with(session flash یک بار مصرف) -> key , value
    }


    public function destroy($id)
    {
        //
    }


    //-------------------- user role (create + store)
    public function createUserRoles($id)
    {
        $user = User::query()->find($id);
        $roles = Role::query()->get();  //collection -> show all role in foreach
        $title = "ایجاد نقش کاربر";  //show breadcrumb
        return view('admin.user.user_roles', compact('user', 'roles', 'title'));
    }


    public function storeUserRoles(Request $request , $id)
    {
        $user = User::find($id);
        $user->syncRoles($request->roles);  //assignRole() -> create  +  syncRoles() -> update(عملیات ساخت و آپدیت با هم)
        return redirect()->route('users.index')->with('message' , 'نقش کاربر با موفقیت ویرایش شد');
    }


}
