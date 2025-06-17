<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('web.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $role = strtolower(trim($user->role));

            if (in_array($role, ['admin', 'provider'])) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful! ' . $user->name);
            } else {
                return redirect()->route('feed')->with('success', 'Login successful! ' . $user->name);
            }
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function register(UserRegisterRequest $request, UserService $userService)
    {
        try {
            $user = $userService->registerUser($request->validated());
            
            Auth::login($user);

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome, ' . $user->name);
            }

            if ($user->hasRole('provider')) {
                return redirect()->back()->with('success', 'Account created successfully, ' . $user->name);
            }

            return redirect()
                ->route('feed')
                ->with('success', 'Registered and logged in successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Password reset link sent successfully to your email!')
            : back()->withErrors(['email' => 'Unable to send reset link. Please try again.']);
    }
    public function showResetForm(Request $request, $token)
    {
        return view('web.auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Your password has been reset successfully!')
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function Profile()
    {
        $profile = User::with('provider')->find(Auth::id());
        return view('web.auth.profile', compact('profile'));
    }

    public function profile_update(Request $request)
    {   

        $user = Auth::user();

        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'nullable|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'bio'          => 'nullable|string',
            'address'      => 'nullable|string|max:255',
            'phone'        => 'nullable|string|max:20',
            'gender'       => 'nullable|in:male,female,other',
            'country'      => 'nullable|string',
            'birthday'     => 'nullable|date',
            'language'     => 'nullable|string',
            'workplace'    => 'nullable|string',
            'education'    => 'nullable|string',
            'position'     => 'nullable|string|max:100',
            'city'         => 'nullable|string|max:100',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png=',
        ]); 


        try {

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

            

            if ($request->hasFile('cover_image')) {
                $cover       = $request->file('cover_image');
                $coverName   = time() . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
                $cover->move(public_path('uploads/cover_image'), $coverName);
                $user->cover_image = 'uploads/cover_image/' . $coverName;
            }


            $user->first_name = $validated['first_name'];
            $user->last_name  = $validated['last_name'] ?? $user->last_name;
            $user->email      = $validated['email'];
            $user->bio        = $validated['bio'] ?? null;
            $user->dob        = $validated['birthday'] ?? null;
            $user->address    = $validated['address'] ?? null;
            $user->phone      = $validated['phone'] ?? null;
            $user->gender     = $validated['gender'] ?? null;
            $user->country    = $validated['country'] ?? null;
            $user->state      = $validated['state'] ?? null;
            $user->city       = $validated['city'] ?? null;
            $user->language   = $validated['language'] ?? null;
            $user->zip        = $validated['zip'] ?? null;
            $user->education  = $validated['education'] ?? null;
            $user->workplace  = $validated['workplace'] ?? null;
            $user->position   = $validated['position'] ?? null;

          
            if (!empty($validated['role'])) {
                $user->role = $validated['role'];
            }

            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

     
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile. ' . $e->getMessage());
        }
    }
}
