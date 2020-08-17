<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return redirect(route('user.index'));
    }
}
