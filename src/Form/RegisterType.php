<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'votre nom', 
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' =>'saisir votre nom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'votre prenom', 
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' =>'saisir votre prenom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'votre email', 
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' =>'saisir votre email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'le mot de passe doit sz confirme',
                'required' => true,
                'label' => 'votre mot de passe', 
                'first_options' =>[
                    'label' =>'mot de passe',
                    'attr' => [
                        'placeholder' =>'saisir votre mot de passe'
                    ]
                ],
                'second_options' =>[
                    'label' =>'confirmer mot de passe',
                    'attr' => [
                        'placeholder' =>'confirmez votre mot de passe'
                    ]
                ]
                
            ])
            ->add('submit', SubmitType::class, [
                'label' => "s'inscrire",
                'attr' =>[
                    'class' => 'btn btn-lg btn-info btn-block mt-3'
                ]
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
