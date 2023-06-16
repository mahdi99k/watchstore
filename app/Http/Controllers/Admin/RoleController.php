<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    public function index()
    {
//      $users = User::query()->paginate(15);
        $title = 'لیست نقش ها';  //show breadcrumb
        return view('admin.role.list' , compact('title'));  //change laravel to livewire
    }


    public function create()
    {
        $title = "ایجاد نقش";  //show breadcrumb
        return view('admin.role.create' , compact('title'));
    }


    public function store(RoleRequest $request)
    {
        //database => input(blade)
        Role::query()->create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('roles.index')->with('message', 'نقش کاربر با موفقیت ثبت شد');  //with(session flash یک بار مصرف) -> key , value
    }


    public function show($id)
    {
        //
    }


    public function edit(Role $role)
    {
        $title = 'ویرایش نقش';
        $role = Role::query()->find($role->id);
        return view('admin.role.edit', compact('role' , 'title'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::query()->find($id);

        $role->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('roles.index')->with('message', 'نقش کاربر با موفقیت ویرایش شد');  //with(session flash یک بار مصرف) -> key , value
    }


    public function destroy($id)
    {
        //
    }

}
