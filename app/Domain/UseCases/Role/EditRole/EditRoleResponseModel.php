<?php

namespace App\Domain\UseCases\Role\EditRole;

use App\Domain\Interfaces\Entities\IRoleEntity;

class EditRoleResponseModel
{
    private $permissions;
    private $role;

    public function __construct(
        IRoleEntity $role,
        array $permissions
    )
    {
        $this->role = $role;
        $this->permissions = $permissions;
    }

    public function getRole(): IRoleEntity
    {
        return $this->role;
    }

    public function getPermissions(): array
    {
        $permissionArr = $this->permissions;
        $groupedPermArr = array_reduce(
            $permissionArr,
            function ($output, $value) {
                $values = explode('.', $value);

                $output[$values[0]]['module'] = $values[0];

                if (isset($values[1])) {
                    $output[$values[0]]['permissions'][] = $values[1];
                }

                return $output;
            },
            []
        );

        $stringifiedPermArr = array_map(
            function ($value) {
                $value['permissions'] = isset($value['permissions']) ? array_unique($value['permissions']) : [];

                return $value;
            },
            $groupedPermArr
        );

        return $stringifiedPermArr;
    }
}
