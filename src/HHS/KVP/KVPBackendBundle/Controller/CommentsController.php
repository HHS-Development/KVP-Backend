<?php

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends FOSRestController
{
    /**
     * @ApiDoc(resource=true, description="test")
     * @Post("/tickets/{ticketId}/comment/{commentId}")
     * @param $ticketId
     * @param $commentId
     * @return Response
     */
    public function postCommentAction($ticketId, $commentId){
        $view = $this->view(array($ticketId => $commentId), 200);
        return $this->handleView($view);
    }
}
