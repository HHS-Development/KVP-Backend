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
use HHS\KVP\KVPBackendBundle\Entity\TicketComment;
use HHS\KVP\KVPBackendBundle\Form\TicketCommentType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CommentsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class CommentsController extends FOSRestController
{

    /**
     * @ApiDoc(resource=true, description="Shows all comments for the given ticket", output="HHS\KVP\KVPBackendBundle\Entity\TicketComment")
     * @Security("has_role('ROLE_USER')")
     * @Get("/tickets/{ticketId}/comments")
     * @param $ticketId
     * @return Response
     */
    public function getCommentsAction($ticketId){
        $comments = $this->getDoctrine()->getRepository("KVPBackendBundle:TicketComment")->findBy(array("ticket" => $ticketId));
        $view = $this->view($comments, 200);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Shows the comment with the given id from the given ticket", output="HHS\KVP\KVPBackendBundle\Entity\TicketComment")
     * @Security("has_role('ROLE_USER')")
     * @Get("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function getCommentAction($ticketId, $commentId){
        $comment = $this->getDoctrine()->getRepository("KVPBackendBundle:TicketComment")->findBy(array("ticket" => $ticketId, "id" => $commentId));
        if(empty($comment)){
            $view = $this->view("There is no ticket comment with this id", 404); //@TODO: create error object
        } else {
            $view = $this->view($comment, 200);
        }
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Create a new comment for the given ticket", output="HHS\KVP\KVPBackendBundle\Entity\TicketComment")
     * @Security("has_role('ROLE_USER')")
     * @Post("/tickets/{ticketId}/comments")
     * @param Request $request
     * @param $ticketId
     * @return Response
     */
    public function postCommentAction(Request $request, $ticketId){

        $entityManager = $this->getDoctrine()->getManager();

        $user = $entityManager->getRepository("KVPBackendBundle:User")->findOneBy(array("username" => $this->getUser()->getUsername()));
        $ticket = $entityManager->getRepository("KVPBackendBundle:Ticket")->find($ticketId);

        $ticketComment = new TicketComment();
        $ticketComment->setUser($user);
        $ticketComment->setTicket($ticket);

        $form = $this->createForm(new TicketCommentType(), $ticketComment);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $entityManager->persist($ticketComment);
            $entityManager->flush();
        }


        $view = $this->view($ticketComment, 200);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Updates an existing ticket by the id")
     * @Security("has_role('ROLE_USER')")
     * @Put("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function putCommentAction($ticketId, $commentId){

    }

    /**
     * @ApiDoc(resource=true, description="Deletes an existing ticket by the id")
     * @Security("has_role('ROLE_USER')")
     * @Delete("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function deleteCommentAction($ticketId, $commentId){

    }
}
