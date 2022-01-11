<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            
            $email = (new Email())
            ->from('ammerisabrine@gmail.com')
            ->to('badia.bysahar@gmail.com')
            ->text('Sending emails is fun again!');

            $mailer->send($email);
            $this->addFlash('notice', 'merci de m avoir nous contacté, nous répondrons le plus tôt possible' );

        }
        return $this->render('contact/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
