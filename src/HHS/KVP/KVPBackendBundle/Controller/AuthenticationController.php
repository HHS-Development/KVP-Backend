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

/**
 * Class AuthenticationController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class AuthenticationController extends FOSRestController
{

    /**
     * @ApiDoc(resource=true, description="Validates the basic authentication user data", output="HHS\KVP\KVPBackendBundle\Entity\User")
     * @Get("/authentication")
     * @Security("has_role('ROLE_SCHUELER')")
     * @return Response
     */
    public function getUserDataAction(){
        $givenUser = $this->get('security.token_storage')->getToken()->getUser();
        $repo = $this->getDoctrine()->getRepository("KVPBackendBundle:User");
        $em = $this->getDoctrine()->getManager();

        $user = $repo->findOneBy(array("username" => $givenUser->getUsername()));
        if(empty($user)) {
            $em->persist($givenUser);
            $em->flush();
            $user = $repo->findOneBy(array("username" => $givenUser->getUsername()));
        }

        $user->setRoles($givenUser->getRoles());

        $view = $this->view($user, 200);
        return $this->handleView($view);
    }
}