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

/**
 * Class TicketState
 * @package HHS\KVP\KVPBackendBundle\Entity
 * @Entity()
 * @Table(name="ticket_state")
 */
class TicketState
{
    /**
     * @Id()
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    protected $id;

    /**
     * @Column(name="state", type="string", unique=true)
     */
    protected $state;
}