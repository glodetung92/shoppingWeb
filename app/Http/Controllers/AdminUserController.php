<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    use DeleteModelTrait;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->latest()->paginate(10);
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
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->row_id);
            DB::commit();
        } catch (\Exception $exception)
        {
            Log::error('Message: ' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }

        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;

        return view('admin.user.edit', compact('user', 'roles', 'roleOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->row_id);
            DB::commit();
        } catch (\Exception $exception)
        {
            Log::error('Message: ' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
