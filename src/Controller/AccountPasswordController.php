<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;


class AccountPasswordController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/account/password", name="account_password")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $notif = null;
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
          $old_pwd = $form->get('old_password')->getData();
          if($encoder->isPasswordValid($user, $old_pwd)){
            $new_pwd = $form->get('new_password')->getData();
            $password = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);
            $this->entityManager->flush();
            $notif = 'modifification avec succées';
          }else{
            $notif = 'modifification a echoue';
          }
        }

        return $this->render('account/password.html.twig', [
            'form'=> $form->createView(),
            'notif' => $notif
        ]);
    }
}
