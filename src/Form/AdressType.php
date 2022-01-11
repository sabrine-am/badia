<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quelle est le nom de votre adresse?', 
                'attr' => [
                    'placeholder' =>'nommer votre adresse'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'votre prenom', 
                'attr' => [
                    'placeholder' =>'saisir votre prenom'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'votre nom', 
                'attr' => [
                    'placeholder' =>'saisir votre nom'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'votre sociéte', 
                'required' => false,
                'attr' => [
                    'placeholder' =>'(facultatif) saisir votre société'
                ]
            ])
            ->add('adress', TextType::class, [
                'label' => 'Quelle est votre adresse?', 
                'attr' => [
                    'placeholder' =>'saisir votre adresse'
                ]
            ])
            ->add('codePostal', TextType::class, [
                'label' => 'votre code postal', 
                'attr' => [
                    'placeholder' =>'saisir votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'votre ville', 
                'attr' => [
                    'placeholder' =>'saisir votre ville'
                ]
            ])
            ->add('pays', CountryType::class, [
                'label' => 'votre pays', 
                'attr' => [
                    'placeholder' =>'choisissez votre pays'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'votre telephone', 
                'attr' => [
                    'placeholder' =>'saisir votre numere de telephone'
                ]
            ])
            ->add('submit', SubmitType::class ,[
                'label' => 'Valider',
                'attr' => [
                    'class' =>'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
