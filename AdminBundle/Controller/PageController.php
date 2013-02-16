<?php
// src/Codopenex/AdminBundle/Controller/PageController.php

namespace Codopenex\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use FOS\UserBundle\Doctrine\UserManager;
use Codopenex\AdminBundle\Entity\Users;
use Codopenex\AdminBundle\Form\UsersType;

class PageController extends Controller
{
    public function dashboardAction()
    {
		return $this->render('CodopenexAdminBundle:Page:dashboard.html.twig', array(
            'HelloAdmin' => 'Hello My Admin'
        ));
	}
	
	public function usersAction()
	{
		//Get Users
		$userManager = $this->get('fos_user.user_manager');

		$users = $userManager->findUsers();
	
		return $this->render('CodopenexAdminBundle:Page:users.html.twig', array(
			'users' => $users
		));	
	}
}