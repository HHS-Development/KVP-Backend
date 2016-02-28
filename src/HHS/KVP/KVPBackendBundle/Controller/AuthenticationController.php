<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthenticationController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class AuthenticationController extends FOSRestController
{

    /**
     * @ApiDoc(resource=true, description="Validates the basic authentication user data", output="HHS\KVP\KVPBackendBundle\Entity\User")
     * @Security("has_role('ROLE_LEHRER')")
     * @Get("/authentication")
     * @return Response
     */
    public function getUserDataAction(){
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        var_dump($user);
        #$em->persist($user);
        #$em->flush();

        $view = $this->view($user, 200);
        return $this->handleView($view);
    }
}