<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Ldap;

use FR3D\LdapBundle\Hydrator\HydratorInterface;
use HHS\KVP\KVPBackendBundle\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

class LdapHydrator implements HydratorInterface
{

    /**
     * Populate an user with the data retrieved from LDAP.
     *
     * @param array $ldapEntry LDAP result information as a multi-dimensional array.
     *              see {@link http://www.php.net/function.ldap-get-entries.php} for array format examples.
     *
     * @return UserInterface
     */
    public function hydrate(array $ldapEntry)
    {
        $user = new User();
        $user->setUsername($ldapEntry["uid"][0]);
        $user->setEmail($ldapEntry["mail"][0]);
        $user->setForename($ldapEntry["givenname"][0]);
        $user->setSurname($ldapEntry["sn"][0]);
        $user->setPassword($ldapEntry["userpassword"][0]);
        $groups = array();
        foreach($ldapEntry["groups"] as $group){
            if(!empty($group["cn"][0])) {
                array_push($groups, "ROLE_".strtoupper($group["cn"][0]));
            }
        }
        $user->setRoles($groups);
        return $user;
    }
}