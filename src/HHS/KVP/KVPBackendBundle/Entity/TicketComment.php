<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * Class TicketComment
 * @package HHS\KVP\KVPBackendBundle\Entity
 * @Entity()
 * @Table(name="ticket_comment")
 */
class TicketComment {

    /**
     * @Id()
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    protected $id;

    /**
     * @Column(type="text")
     */
    protected $message;

    /**
     * @ManyToOne(targetEntity="HHS\KVP\KVPBackendBundle\Entity\Ticket", inversedBy="comments")
     */
    protected $ticket;

    /**
     * @ManyToOne(targetEntity="HHS\KVP\KVPBackendBundle\Entity\User")
     */
    protected $user;

    /**
     * TicketComment constructor.
     */
    public function __construct() {
        $this->user = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}