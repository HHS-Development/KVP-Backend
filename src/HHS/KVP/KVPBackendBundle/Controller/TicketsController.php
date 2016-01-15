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
use HHS\KVP\KVPBackendBundle\Entity\Ticket;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class TicketsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 * @Security("has_role('ROLE_USER')")
 */
class TicketsController extends FOSRestController {

    /**
     * @ApiDoc(resource=true, description="Get all existing tickets", output="HHS\KVP\KVPBackendBundle\Entity\Ticket")
     * @Get("/tickets")
     * @return Response
     */
    public function getTicketsAction(){
        $repo = $this->getDoctrine()->getEntityManager()->getRepository("KVPBackendBundle:Ticket");
        $tickets = $repo->findAll();
        $view = $this->view($tickets);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Get an existing ticket by id")
     * @Get("/tickets/{id}")
     * @param $id ticket id
     * @return Response
     */
    public function getTicketAction($id){
        throw new NotImplementedException("");
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