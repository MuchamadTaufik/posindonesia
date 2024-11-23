<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('dashboard-kepala.pengguna.index', compact('user'));
    }

    public function create()
    {
        return view('dashboard-kepala.pengguna.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:staff,kepala',
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        toast()->success('Berhasil', 'Pengguna Berhasil ditambahkan');
        return redirect('/daftar-pengguna')->withInput();
    }

    public function edit(User $user)
    {
        return view('dashboard-kepala.pengguna.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            // Validasi input
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role' => 'required|in:staff,kepala',
                'password' => 'nullable|string|min:8|confirmed',
            ];
            
            $validatedData = $request->validate($rules);
            
            // Hapus password dari validated data jika tidak diisi
            if (empty($validatedData['password'])) {
                unset($validatedData['password']);
            } else {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
            
            // Update user
            $user->update($validatedData);
            
            alert()->success('Berhasil', 'Data pengguna berhasil diperbarui');
            return redirect()->route('pengguna')->with('success', 'Data pengguna berhasil diperbarui');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();
                
        } catch (\Exception $e) {
            alert()->error('Error', 'Terjadi kesalahan saat memperbarui data pengguna');
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data pengguna')
                ->withInput();
        }
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        alert()->success('Success', 'Pengguna berhasil dihapus');
        return redirect('/daftar-pengguna')->withInput();
    }
}
