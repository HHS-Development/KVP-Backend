<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\FOSRestController;
use HHS\KVP\KVPBackendBundle\Model\Ticket;

/**
 * Class TicketsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class TicketsController extends FOSRestController {

    /**
     * @Get("/tickets")
     * @return Ticket
     */
    public function getTicketsAction(){
        $ticket = new Ticket(1, "test");
        $view = $this->view($ticket, 200);
        return $this->handleView($view);
    }

    /**
     * @Get("/tickets/{id}")
     * @param $id ticket id
     */
    public function getTicketAction($id){

    }

    /**
     * @Post("/tickets")
     */
    public function postTicketAction(){

    }

    /**
     * @Put("/tickets/{id}")
     * @param $id ticket id
     */
    public function putTicketAction($id){

    }

    /**
     * @Delete("/tickets/{id}")
     * @param $id
     */
    public function deleteTicketAction($id){

    }
}