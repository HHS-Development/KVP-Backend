<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Ldap;

use FR3D\LdapBundle\Hydrator\HydratorInterface;
use HHS\KVP\KVPBackendBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LdapHydrator implements HydratorInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * LdapHydrator constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


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
        $user->setUsername($ldapEntry[$this->container->getParameter("ldap_value_uid")][0]);
        $user->setEmail($ldapEntry[$this->container->getParameter("ldap_value_mail")][0]);
        $user->setForename($ldapEntry[$this->container->getParameter("ldap_value_forename")][0]);
        $user->setSurname($ldapEntry[$this->container->getParameter("ldap_value_surname")][0]);
        $user->setPassword($ldapEntry[$this->container->getParameter("ldap_value_password")][0]);
        $groups = array();
        foreach($ldapEntry["groups"] as $group){
            if(!empty($group[$this->container->getParameter("ldap_value_group_name")][0])) {
                array_push($groups, "ROLE_".strtoupper($group[$this->container->getParameter("ldap_value_group_name")][0]));
            }
        }
        $user->setRoles($groups);
        return $user;
    }
}