<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserDoctrineRepository;
use App\Security\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 

class UserAdminController extends AbstractController 
{

    /**
     * @Route("/users", name="user_list") 
     */
    public function listUsers(UserDoctrineRepository $userRepository) 
    {
        $users = $userRepository->findAllSuperAdmins(); 
        return $this->render('admin/user/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/create-user", name="create_user") 
     */
    public function createUser(FormFactoryInterface $formFactory, Request $request) : Response
    {   
        $form = $formFactory->createNamedBuilder('user', FormType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) { 
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();
    
            return $this->render('admin/user/create.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    
        return $this->render('admin/user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
