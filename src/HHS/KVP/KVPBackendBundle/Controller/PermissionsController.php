<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\FOSRestBundle;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserManagementController
 * @package HHS\KVP\KVPBackendBundle\Controller
 */
class PermissionsController extends FOSRestBundle {

    /**
     * @ApiDoc(resource=true, description="Grants an existing user admin permissions")
     * @Post("/permissions/{userId}")
     * @param $userId
     * @return Response
     */
    public function postAdminPermissionAction($userId){

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
