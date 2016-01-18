<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use HHS\KVP\KVPBackendBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AuthenticationController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class AuthenticationController extends FOSRestController
{

    /**
     * @ApiDoc(resource=true, description="Validates the basic authentication user data", output="HHS\KVP\KVPBackendBundle\Entity\User")
     * @Security("has_role('ROLE_USER')")
     * @Get("/authentication")
     * @return Response
     */
    public function getUserDataAction(){
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $dbUser = $this->getDoctrine()->getRepository("KVPBackendBundle:User")->findBy(array("username" => $user->getUsername()));
        if(empty($dbUser)){
            throw new NotFoundHttpException("Useraccount not found");
        }
        $view = $this->view($dbUser, 200);
        return $this->handleView($view);
    }
}