<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = User::with('provider')->has('provider')->orderBy('id', 'desc')->get();
        $user = User::where('role', 'provider')->orderBy('id', 'desc')->get();
        // return $providers;
        return view('admin.provider.index', [
            'providers' => $providers,
            'users' => $user
        ]);
    }

    public function store(UserRegisterRequest $request, UserService $userService)
    {
        try {
            $userService->registerUser($request->validated());
            return redirect()
                ->route('admin.provider.index')
                ->with('success', 'Provider created successfully!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create provider: ' . $e->getMessage());
        }
    }


    public function update(UserRegisterRequest $request, UserService $userService, $id)
    {
        try {
            $userService->updateUser($id, $request->validated()); // correct order
            return redirect()
                ->route('admin.provider.index')
                ->with('success', 'Provider updated successfully!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update provider: ' . $e->getMessage());
        }
    }

    public function user_update(Request $request)
    {

        $id = $request->user;
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $id,
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/profiles'), $imageName);

            $imagePath = 'uploads/profiles/' . $imageName;

            if ($user->type === 'provider') {
                $user->provider->logo = $imagePath;
                $user->provider->save();
            } else {
                $user->image = $imagePath;
            }
        }

        $user->save();

        return redirect()->route('admin.provider.index')->with('success', 'User updated successfully.');
    }



    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()
            ->route('admin.provider.index')
            ->with('success', 'Provider deleted successfully!!');
    }
}
