<?php

namespace App\Domain\UseCases\Role\CreateRole;

class CreateRoleResponseModel
{
    private $permissions;

    public function __construct(
        array $permissions
    )
    {
        $this->permissions = $permissions;
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
