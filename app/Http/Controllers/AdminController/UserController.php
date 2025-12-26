<?php
// app/Http/Controllers/AdminController/UserController.php
namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin-panel.users.list', compact('users'));
    }

    public function add()
    {
        $roles = Role::orderBy('name')->get(); // لعرضها بالقائمة
        return view('admin-panel.users.add', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:100'],
            'email'    => ['required','email','max:191','unique:users,email'],
            'password' => ['required','string','min:6'],
            'role_id'  => ['required','integer','exists:roles,id'],
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $data['role_id'], // why: ربط المستخدم بالدور
        ]);

        return redirect()->route('users.list')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::orderBy('name')->get();
        return view('admin-panel.users.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'    => ['required','string','max:100'],
            'email'   => ['required','email','max:191', Rule::unique('users','email')->ignore($user->id)],
            'role_id' => ['required','integer','exists:roles,id'],
            // password اختياري بالتعديل
            'password'=> ['nullable','string','min:6'],
        ]);

        $payload = [
            'name'    => $data['name'],
            'email'   => $data['email'],
            'role_id' => $data['role_id'],
        ];
        if (!empty($data['password'])) {
            $payload['password'] = Hash::make($data['password']); // why: لا نغيّرها إن كانت فارغة
        }

        $user->update($payload);

        return redirect()->route('users.list')->with('success', 'User updated successfully.');
    }
}
