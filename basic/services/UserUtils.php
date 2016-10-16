<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 10/16/16
 * Time: 1:41 AM
 */

namespace app\services;


use app\db\Users;

class UserUtils
{
    const ROLE_PM = "ROLE_PM";
    const ROLE_EMPLOYEE = "ROLE_EMPLOYEE";
    const ROLE_ADMIN = "ROLE_ADMIN";

    /**
     * @param Users[] $users
     * @param string $prompt
     * @return array
     */
    public static function usersToSelector($users, $prompt) {
        $toSelector = [
            0 => "$prompt"
        ];
        foreach ($users as $user) {
            $toSelector[$user->id] = $user->full_name;
        }
        return $toSelector;
    }
}