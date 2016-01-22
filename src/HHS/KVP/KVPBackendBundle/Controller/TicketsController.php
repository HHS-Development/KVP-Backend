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
use HHS\KVP\KVPBackendBundle\Form\TicketType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TicketsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class TicketsController extends FOSRestController {

    /**
     * @ApiDoc(resource=true, description="Get all existing tickets", output="HHS\KVP\KVPBackendBundle\Entity\Ticket")
     * @Get("/tickets")
     * @return Response
     */
    public function getTicketsAction(){
        $repo = $this->getDoctrine()->getRepository("KVPBackendBundle:Ticket");
        $tickets = $repo->findAll();
        $view = $this->view($tickets);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Get an existing ticket by id")
     * @Get("/tickets/{ticketId}")
     * @param $ticketId ticket id
     * @return Response
     */
    public function getTicketAction($ticketId){
        $ticket = $this->getDoctrine()->getRepository("KVPBackendBundle:Ticket")->find($ticketId);
        if(empty($ticket)){
            return new NotFoundHttpException("There is no ticket with the given id");
        }
        $view = $this->view($ticket);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Create a new ticket")
     * @Security("has_role('ROLE_USER')")
     * @Post("/tickets")
     * @return Response
     */
    public function postTicketAction(){

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("KVPBackendBundle:User")->findOneBy(array("username" => $this->getUser()->getUsername()));

        $ticket = new Ticket();
        $ticket->setCreator($user);

        $form = $this->createForm(new TicketType(), $ticket);

        if($form->isValid()){

        } else {

        }
    }

    /**
     * @ApiDoc(resource=true, description="Updates an existing ticket by id")
     * @Security("has_role('ROLE_USER')")
     * @Put("/tickets/{id}")
     * @param $id ticket id
     * @return Response
     */
    public function putTicketAction($id){

    }

    /**
     * @ApiDoc(resource=true, description="Deletes an existing ticket by id")
     * @Security("has_role('ROLE_ADMIN')")
     * @Delete("/tickets/{id}")
     * @param $id
     * @return Response
     */
    public function deleteTicketAction($id){

    }
}