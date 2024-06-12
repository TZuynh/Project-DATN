<?php

namespace App\Repositories\Role;

use App\Repositories\RepositoryInterface;

/**
 * The repository interface for the Role Model
 */
interface RoleRepositoryInterface extends RepositoryInterface
{

    /**
     * Return all roles with loaded permissions
     *
     * @return collection
     */
    public function allRolesWithPermissions();

    /**
     * Return all roles with loaded permissions
     *
     * @return collection
     */
    public function getStaffRole();
}
