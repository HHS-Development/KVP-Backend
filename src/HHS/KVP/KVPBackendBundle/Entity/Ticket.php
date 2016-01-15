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
 * Class Ticket
 * @package HHS\KVP\KVPBackendBundle\Entity
 * @Entity()
 * @Table(name="ticket")
 */
class Ticket {

    /**
     * @Id()
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="HHS\KVP\KVPBackendBundle\Entity\User")
     */
    protected $creator;

    /**
     * @ManyToOne(targetEntity="HHS\KVP\KVPBackendBundle\Entity\TicketState")
     */
    protected $state;

    /**
     * @Column(name="content", type="text")
     */
    protected $content;

    /**
     * @OneToMany(targetEntity="HHS\KVP\KVPBackendBundle\Entity\TicketComment", mappedBy="ticket")
     */
    protected $comments;

    /**
     * Ticket constructor.
     */
    public function __construct() {
        $this->user = new ArrayCollection();
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
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return array TicketComment
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array TicketComment $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return TicketState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param TicketState $state
     */
    public function setState(TicketState $state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}