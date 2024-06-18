<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $parameter = array();
        $users = User::orderBy('id', 'DESC')->where('phone', 'like', '%' . $request->phone . '%')->paginate(20);
        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $data = $request->all('name', 'gender', 'address', 'year_of_birth', 'level', 'point_buy');
        if ($request->email !== $user->email) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
            if (!$validator->fails()) {
                $data['email'] = $request->email;
            } else {
                session()->flash('error', 'Email đã tồn tại');
                return redirect()->back();
            }
        }
        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6|max:20'
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        session()->flash('success', 'Cập nhật thành công');
        return redirect()->back();
    }

    public function type(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            if ($user->type == 1) {
                $user->type = 2;
            } else {
                $user->type = 1;
            }
            $user->save();
        }
    }

    public function exportUser()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
