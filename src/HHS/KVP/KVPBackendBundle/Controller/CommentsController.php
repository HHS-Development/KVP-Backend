<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CommentsController
 * @package HHS\KVP\KVPBackendBundle\Controller
 * @Security("has_role('ROLE_USER')")
 */
class CommentsController extends FOSRestController
{
    /**
     * @ApiDoc(resource=true, description="Create a new comment for the given ticket")
     * @Post("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function postCommentAction($ticketId, $commentId){
        $view = $this->view(array($ticketId => $commentId), 200);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Updates an existing ticket by the id")
     * @Put("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function putCommentAction($ticketId, $commentId){

    }

    /**
     * @ApiDoc(resource=true, description="Deletes an existing ticket by the id")
     * @Delete("/tickets/{ticketId}/comments/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function deleteCommentAction($ticketId, $commentId){

    }
}
