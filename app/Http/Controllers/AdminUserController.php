<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use DB;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(
        User $user,
        Role $role
    )
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {

        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataInset = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $user = $this->user->create($dataInset);
            // Insert tags for product
            if (isset($request->role_ids) && is_array($request->role_ids)) {
                $user->roles()->attach($request->role_ids);
            }
            DB::commit();
            return redirect(route('user.index'));
        }  catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messages:' .$exception->getMessage(). '. ------Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $userRole =  $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user = $this->user->find($id);
            $user->update($dataUpdate);
            // Insert tags for product
            if (isset($request->role_ids) && is_array($request->role_ids)) {
                $user->roles()->sync($request->role_ids);
            }
            DB::commit();
            return redirect(route('user.index'));
        }  catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Messages:' .$exception->getMessage(). '. ------Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();
    }
}
