<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Class User
 * @package HHS\KVP\KVPBackendBundle\Entity
 * @Entity()
 * @Table(name="user")
 */
class User implements AdvancedUserInterface {

    /**
     * @Id()
     * @Column(name="id",type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;

    /**
     * @Column(name="forename", type="string", length=255)
     */
    protected $forename;

    /**
     * @Column(name="surname", type="string", length=255)
     */
    protected $surname;

    /**
     * @Column(name="email", type="string", length=255)
     */
    protected $email;

    protected $roles;

    protected $password;


    /**
     * User constructor.
     * @param $username
     * @param $forename
     * @param $surname
     * @param $email
     */
    public function __construct($username = null, $forename = null, $surname = null, $email = null)
    {
        $this->username = $username;
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
        $this->roles = array();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * @param string $forename
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles){
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return "";
    }

    public function eraseCredentials()
    {
        unset($this->password);
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return true;
    }
}