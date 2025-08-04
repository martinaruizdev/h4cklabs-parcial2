<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show($id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_admin' => 'boolean',
        ]);

        $data = $request->only(['name', 'bio']);
        $data['is_admin'] = $request->boolean('is_admin');

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()
            ->route('users.show', $user->id)
            ->with('feedback.message', 'Usuario actualizado correctamente.')
            ->with('feedback.type', 'success');
    }

    public function destroy($id)
    {
        /** @var \App\Models\User $user */
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('dashboard')
            ->with('feedback.message', 'Usuario eliminado correctamente.')
            ->with('feedback.type', 'success');
    }
}
