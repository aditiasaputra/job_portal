<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * Get users.
     *
     * @return mixed
     */
    public function all($role);

    /**
     * Get user by id.
     *
     * @param int
     */
    public function get($user_id);

    /**
     * Update or Create user.
     *
     * @param int
     * @param array
     */
    public function updateCreate(array $user_data);

    /**
     * Delete user by id.
     *U
     * @param int
     */
    public function delete($user_id);
}
