<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get users.
     *
     * @return mixed
     */
    public function all($role)
    {
        return User::role($role)->get();
    }

    /**
     * Get user by id.
     *
     * @param User $user
     */
    public function get($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    /**
     * Update or Create user by id.
     *
     * @param int
     * @param array
     */
    public function updateCreate(array $user_data)
    {
        User::updateOrCreate([
            'id' => $user_data['id'],
            'username' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => $user_data['password'],
        ]);
        User::create()->assignRole($user_data['role']);
    }

    /**
     * Delete user by id.
     *
     * @param User $user
     */
    public function delete($user_id)
    {
        return 'ok';
    }
}
