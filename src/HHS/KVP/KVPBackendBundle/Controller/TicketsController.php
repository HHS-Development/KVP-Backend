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
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TicketsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class TicketsController extends FOSRestController {

    /**
     * @ApiDoc(resource=true, description="Get all existing tickets")
     * @Get("/tickets")
     * @return Response
     */
    public function getTicketsAction(){
        $ticket = new Ticket(1, "test");
        $view = $this->view($ticket, 200);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Get an existing ticket by id")
     * @Get("/tickets/{id}")
     * @param $id ticket id
     * @return Response
     */
    public function getTicketAction($id){

    }

    /**
     * @ApiDoc(resource=true, description="Create a new ticket")
     * @Post("/tickets")
     * @return Response
     */
    public function postTicketAction(){

    }

    /**
     * @ApiDoc(resource=true, description="Updates an existing ticket by id")
     * @Put("/tickets/{id}")
     * @param $id ticket id
     * @return Response
     */
    public function putTicketAction($id){

    }

    /**
     * @ApiDoc(resource=true, description="Deletes an existing ticket by id")
     * @Delete("/tickets/{id}")
     * @param $id
     * @return Response
     */
    public function deleteTicketAction($id){

    }
}