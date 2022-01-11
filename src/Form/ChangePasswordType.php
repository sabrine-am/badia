<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', TextType::class, [
            'label' => 'votre nom', 
            'disabled' => true
        ])
        ->add('lastname', TextType::class, [
            'label' => 'votre prenom', 
            'disabled' => true

        ])
        ->add('email', EmailType::class, [
            'label' => 'votre email', 
            'disabled' => true

        ])
        ->add('old_password', PasswordType::class, [
            'label' => 'votre ancien mot de passe', 
            'mapped' => false,
            'attr' => [
                'placeholder' =>'saisir votre ancien mot de passe'
            ]

        ])
        ->add('new_password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'le mot de passe doit sz confirme',
            'required' => true,
            'mapped' => false,
            'label' => 'votre mot de passe', 
            'first_options' =>[
                'label' =>'nouveau mot de passe',
                'attr' => [
                    'placeholder' =>'saisir votre nouveau mot de passe'
                ]
            ],
            'second_options' =>[
                'label' =>'confirmer nouveau mot de passe',
                'attr' => [
                    'placeholder' =>'confirmez votre nouveau mot de passe'
                ]
            ]
            
        ])
        ->add('submit', SubmitType::class, [
            'label' => "modifier"
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
