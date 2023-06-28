<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Alert;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $data['user'] = User::get();
        $data['role'] = Role::pluck('role_name', 'id');
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|string|max:255|email|unique:user',
                'password' => 'required',
                'roles' => 'required'
            ]
        );

        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }
        Alert::success('New User Created!');

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $data['user'] = User::select('id', 'name', 'email', 'id_role')->findOrFail($id);
        $data['role'] = Role::pluck('role_name', 'id');
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'id_role' => 'required'
            ]
        );

        $user = User::findOrFail($id);
        User::where(['id' => $id])->update([
            'id_role' => $request->id_role
        ]);

        Alert::success('User Edited!' );

        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Alert::success('User Deleted!' );
        User::destroy($id);

        return redirect('admin/user');
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->is_verified = 1;
        $user->save();
        Alert::success('User Approved!' );

        return redirect('admin/user');
    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->is_verified = 0;
        $user->save();
        Alert::success('User Rejected!' );

        return redirect('admin/user');
    }
}
