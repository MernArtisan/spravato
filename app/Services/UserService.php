<?php

namespace App\Services;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function registerUser(array $data): User
    {
       
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'role'       => $data['role'],
        ]);

        $user->assignRole($data['role']);
 
        if ($data['role'] === 'provider') {
            $providerData = [
                'user_id'             => $user->id,
                'name'                => $data['provider_store_name'] ?? '',
                'establish_since'     => $data['establish_since'] ?? '',
                'description'         => $data['description'] ?? '',
                'status'              => $data['status'] ?? 'hold',
            ];

            if (isset($data['logo']) && $data['logo']->isValid()) {
                $fileName = time() . '_' . $data['logo']->getClientOriginalName();
                $data['logo']->move(public_path('uploads/providers/logos'), $fileName);
                $providerData['logo'] = 'uploads/providers/logos/' . $fileName;
            }

            if (isset($data['certificate']) && $data['certificate']->isValid()) {
                $fileName = time() . '_' . $data['certificate']->getClientOriginalName();
                $data['certificate']->move(public_path('uploads/providers/certificates'), $fileName);
                $providerData['certificate'] = 'uploads/providers/certificates/' . $fileName;
            }

            Provider::create($providerData);
        }

        return $user;
    }

    public function updateUser($id, array $data): User
    {
        $user = User::findOrFail($id);
        
        // Update basic user data
        $user->update([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'role'       => $data['role'],
            'password'   => !empty($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        // Sync role
        $user->syncRoles([$data['role']]);

        // If provider, update provider details
        if ($data['role'] === 'provider') {
            $provider = Provider::where('user_id', $user->id)->firstOrNew(['user_id' => $user->id]);

            $provider->name = $data['provider_store_name'] ?? $provider->name;
            $provider->establish_since = $data['establish_since'] ?? $provider->establish_since;
            $provider->description = $data['description'] ?? $provider->description;
            $provider->status = $data['status'] ?? $provider->status;

            // Logo upload
            if (isset($data['logo']) && $data['logo']->isValid()) {
                $fileName = time() . '_' . $data['logo']->getClientOriginalName();
                $data['logo']->move(public_path('uploads/providers/logos'), $fileName);
                $provider->logo = 'uploads/providers/logos/' . $fileName;
            }

            // Certificate upload
            if (isset($data['certificate']) && $data['certificate']->isValid()) {
                $fileName = time() . '_' . $data['certificate']->getClientOriginalName();
                $data['certificate']->move(public_path('uploads/providers/certificates'), $fileName);
                $provider->certificate = 'uploads/providers/certificates/' . $fileName;
            }
          
            $provider->save();
        }

        return $user;
    }
}
