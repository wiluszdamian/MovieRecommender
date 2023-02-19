<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function updateUser(User $user, array $data): bool
    {
        if (!isset($data['current_password']) || !$this->checkPassword($data['current_password'], $user->password)) {
            return false;
        }
        $updateData = array_intersect_key($data, array_flip(['name', 'email', 'password']));
        $updateData = array_filter($updateData, function ($value) {
            return $value !== null;
        });
        if (isset($data['new_password'])) {
            $updateData['password'] = Hash::make($data['new_password']);
        }
        return $user->update($updateData);
    }

    private function checkPassword($password, $hashedPassword)
    {
        return Hash::check($password, $hashedPassword);
    }
}
