<?php

namespace App\Form;

use App\Entity\Conduire;
use App\Entity\User;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConduireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('realiser_at', DateType::class)
            ->add('partir', TextType::class)
            ->add('arriver', TextType::class)
            ->add('distance', IntegerType::class)
            ->add('compteur', IntegerType::class)
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class
            ])
            ->add('conducteur', EntityType::class, [
                'class' => User::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conduire::class,
        ]);
    }
}
