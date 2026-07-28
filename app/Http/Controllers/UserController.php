<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:Admin,Kepegawaian,PJI,Kepala Balai,Operasional',
        ]);

        User::create([
            'nama_user' => $request->username,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id_user, 'id_user'),
            ],
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|in:Admin,Kepegawaian,PJI,Kepala Balai,Operasional',
        ]);

        $data = [
            'nama_user' => $request->username,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting oneself
        if ($user->id_user === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Delete related alasan_penolakans
        $reviewOperasionalIds = \App\Models\ReviewOperasional::where('id_user', $user->id_user)->pluck('id_review_operasional');
        \App\Models\AlasanPenolakan::whereIn('id_review_operasional', $reviewOperasionalIds)->delete();

        // Delete related review_operasionals
        \App\Models\ReviewOperasional::where('id_user', $user->id_user)->delete();

        // Delete related review_katim_pjis
        \App\Models\ReviewKatimPji::where('id_user', $user->id_user)->delete();

        // Finally delete user
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
