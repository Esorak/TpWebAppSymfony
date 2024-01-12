<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/*
user admin controller class 
Responsabilities : -handle user creation and edition form 
                   -display list of user */
class UserAdminController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function createUser(FormFactoryInterface $formFactory, Request $request) : Response 
    {

        $form = $formFactory-> createNameBuilder('user', FormType::class, [], [])
            ->add('firstname', TextType::class, [])
            ->add('lastname', TextType::class, [])
            ->add('email', TextType::class, [])
            ->add('password', TextType::class, [])
            ->getform()
            ;

        return $this->render('admin/user/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
