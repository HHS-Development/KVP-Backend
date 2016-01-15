<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use HHS\KVP\KVPBackendBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserManagementController
 * @package HHS\KVP\KVPBackendBundle\Controller
 * @Security("has_role('ROLE_ADMIN')")
 */
class PermissionsController extends FOSRestController {

    /**
     * @ApiDoc(resource=true, description="Grants an existing user admin permissions")
     * @Get("/permissions/{userId}")
     * @param $userId
     * @return Response
     */
    public function postAdminPermissionAction($userId){
        $view = $this->view(array($userId => $userId), 200);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(resource=true, description="Deletes the user admin permission for an given user id")
     * @Delete("/permissions/{userId}")
     * @param $userID
     * @return Response
     */
    public function deleteAdminPermissionAction($userID){

    }



}
